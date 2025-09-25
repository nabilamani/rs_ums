<?php

namespace App\Livewire\Articles;

use App\Models\CategoryArticle;
use Flux\Flux;
use Livewire\Component;

class CategoryArticles extends Component
{
    protected $listeners = ['categoryAdded' => '$refresh', 'categoryUpdated' => '$refresh'];

    public ?int $deleteId = null;

    public function render()
    {
        return view('livewire.articles.category-articles', [
            'categories' => CategoryArticle::latest()->get(),
        ]);
    }

    public function confirmDelete(int $id): void
    {
        $this->deleteId = $id;
        Flux::modal('deleteCategory')->show();
    }

    public function deleteCategory(): void
    {
        CategoryArticle::findOrFail($this->deleteId)->delete();
        $this->reset('deleteId');

        $this->dispatch('categoryAdded'); // refresh list
        session()->flash('success', 'Kategori artikel berhasil dihapus.');

        Flux::modal('deleteCategory')->close();
    }
}

