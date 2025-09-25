<?php

namespace App\Livewire\Articles;

use App\Models\Article;
use Flux\Flux;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Articles extends Component
{
    protected $listeners = ['articleAdded' => '$refresh', 'articleUpdated' => '$refresh'];

    public ?int $deleteId = null;

    use WithPagination;   // <- WAJIB untuk pagination Livewire


    public function render()
    {
        $articles = Article::latest()->paginate(8);

        return view('livewire.articles.article', [
            'articles'          => $articles,
            'countPublished'    => Article::where('status', 'published')->count(),
            'countDraft'        => Article::where('status', 'draft')->count(),
            'countTotal'        => Article::count(),
        ]);
    }


    public function confirmDelete(int $id): void
    {
        $this->deleteId = $id;
        Flux::modal('deleteArticle')->show();
    }

    public function deleteArticle(): void
    {
        $article = Article::findOrFail($this->deleteId);

        // ✅ Hapus file thumbnail bila ada
        if ($article->thumbnail && Storage::disk('public')->exists($article->thumbnail)) {
            Storage::disk('public')->delete($article->thumbnail);
        }

        $article->delete();
        $this->reset('deleteId');

        $this->dispatch('articleAdded'); // refresh list
        session()->flash('success', 'Artikel berhasil dihapus.');
        Flux::modal('deleteArticle')->close();
    }
}
