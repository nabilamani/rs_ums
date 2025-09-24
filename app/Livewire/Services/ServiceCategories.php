<?php

namespace App\Livewire\Services;

use Livewire\Component;
use App\Models\ServiceCategory;
use Flux\Flux;

class ServiceCategories extends Component
{
    // property agar Livewire me-refresh setelah create
    protected $listeners = ['serviceCategoryAdded' => '$refresh', 'serviceCategoryUpdated' => '$refresh'];

    public function render()
    {
        return view('livewire.services.service-categories', [
            'categories' => ServiceCategory::latest()->get(),
        ]);
    }

    public function edit($id)
    {
        $this->dispatch('editServiceCategory', $id);
    }

    public ?int $categoryId = null;

    public function confirmDelete(int $id): void
    {
        $this->categoryId = $id;
        Flux::modal('deleteServiceCategory')->show();
    }

    public function deleteCategory(): void
    {
        if ($this->categoryId) {
            ServiceCategory::find($this->categoryId)?->delete();
        }

        $this->reset('categoryId');

        Flux::modal('deleteServiceCategory')->close();
        session()->flash('success', 'Kategori layanan berhasil dihapus.');

        // event untuk refresh
        $this->dispatch('serviceCategoryDeleted');
    }
}
