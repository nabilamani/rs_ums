<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\CategoryArticle;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        // Get categories for filter
        $categories = CategoryArticle::all();
        
        // Start query for published articles only
        $query = Article::where('status', 'published')
                       ->whereNotNull('published_at')
                       ->where('published_at', '<=', now());
        
        // Apply filters if exist
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
        
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('excerpt', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('content', 'LIKE', "%{$searchTerm}%");
            });
        }
        
        // Apply sorting
        $sortBy = $request->get('sort', 'newest');
        if ($sortBy === 'popular') {
            $query->orderBy('views', 'desc')
                  ->orderByDesc('published_at'); // Secondary sort
        } else {
            $query->orderByDesc('published_at');
        }
        
        // Get featured article (most recent, only if no search/filter applied)
        $featuredArticle = null;
        if (!$request->filled('search') && !$request->filled('category')) {
            $featuredArticle = Article::where('status', 'published')
                                    ->whereNotNull('published_at')
                                    ->where('published_at', '<=', now())
                                    ->with(['category', 'author'])
                                    ->orderByDesc('published_at')
                                    ->first();
        }
        
        // Get other articles (exclude featured article and paginate)
        $articlesQuery = clone $query;
        if ($featuredArticle) {
            $articlesQuery->where('id', '!=', $featuredArticle->id);
        }
        
        // Paginate with query parameters preserved
        $articles = $articlesQuery->with(['category', 'author'])
                                ->paginate(6)
                                ->withQueryString(); // This preserves all query parameters
        
        // Statistics
        $totalArticles = Article::where('status', 'published')->count();
        $weeklyArticles = Article::where('status', 'published')
                               ->where('published_at', '>=', now()->subWeek())
                               ->count();
        $totalCategories = CategoryArticle::count();

        // Calculate total views - FIX: Add this calculation
        $totalViews = Article::where('status', 'published')->sum('views') ?? 0;
        
        return view('livewire.viewpublik.artikel', compact(
            'featuredArticle',
            'articles',
            'categories',
            'totalArticles',
            'weeklyArticles',
            'totalCategories',
            'totalViews',
        ));
    }
    
    public function show($slug)
    {
        $article = Article::where('slug', $slug)
                         ->where('status', 'published')
                         ->whereNotNull('published_at')
                         ->where('published_at', '<=', now())
                         ->with(['category', 'author'])
                         ->firstOrFail();
        
        // Increment views (uncomment if you want to track views)
        $article->increment('views');
        
        // Get related articles
        $relatedArticles = Article::where('status', 'published')
                                ->whereNotNull('published_at')
                                ->where('published_at', '<=', now())
                                ->where('id', '!=', $article->id)
                                ->where('category_id', $article->category_id)
                                ->with(['category', 'author'])
                                ->limit(3)
                                ->get();
        
        return view('livewire.viewpublik.artikel-detail', compact('article', 'relatedArticles'));
    }
}