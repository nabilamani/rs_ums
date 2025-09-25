<?php

namespace App\Livewire\Articles;

use App\Models\CategoryArticle;
use Flux\Flux;
use Livewire\Component;

class UpdateCategory extends Component
{
    public $categoryId;
    public $name;
    public $slug;

    protected $listeners = [
        'editCategory' => 'editCategory',
    ];

    protected function rules()
    {
        return [
            'name' => 'required|string|unique:category_articles,name,' . $this->categoryId,
            'slug' => 'required|string|unique:category_articles,slug,' . $this->categoryId,
        ];
    }

    public function editCategory($id): void
    {
        $cat = CategoryArticle::findOrFail($id);
        $this->categoryId = $cat->id;
        $this->name = $cat->name;
        $this->slug = $cat->slug;

        Flux::modal('edit-category')->show();
    }

    public function update(): void
    {
        $this->validate();

        CategoryArticle::findOrFail($this->categoryId)->update([
            'name' => $this->name,
            'slug' => $this->slug,
        ]);

        $this->reset();

        Flux::modal('edit-category')->close();

        session()->flash('success', 'Kategori berhasil diperbarui.');
        $this->dispatch('categoryUpdated');
    }

    public function render()
    {
        return view('livewire.articles.update-category');
    }
}


