<?php

namespace App\Livewire\Articles;
use App\Models\CategoryArticle;
use Flux\Flux;
use Livewire\Component;

class CreateCategory extends Component
{
    public $name;
    public $slug;

    protected function rules()
    {
        return [
            'name' => 'required|string|unique:category_articles,name',
            'slug' => 'required|string|unique:category_articles,slug',
        ];
    }

    public function save()
    {
        $this->validate();

        CategoryArticle::create([
            'name' => $this->name,
            'slug' => $this->slug,
        ]);

        $this->reset();

        // tutup modal
        Flux::modal('add-category')->close();

        session()->flash('success', 'Kategori berhasil ditambahkan.');

        $this->dispatch('categoryAdded');
    }

    public function render()
    {
        return view('livewire.articles.create-category');
    }
}
