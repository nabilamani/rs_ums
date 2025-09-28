<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use App\Models\Article;          // ← tambahkan
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        // 6 layanan terbaru
        $categories = ServiceCategory::latest()->take(6)->get();
        $gradients  = config('gradients');

        // 3 artikel terakhir yang status = 'published'
        $articles   = Article::where('status','published')
                        ->latest('published_at')
                        ->take(3)
                        ->get();

        return view('livewire.viewpublik.beranda', compact('categories','gradients','articles'));
    }
}
