<?php

namespace App\Livewire\Services;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Service;
use App\Models\ServiceCategory;

class Services extends Component
{
    use WithPagination;

    protected $listeners = ['serviceAdded' => '$refresh'];

    public ?int $categoryId = null;
    public ?ServiceCategory $category = null;

    public string $search = '';
    public string $sort   = 'latest';

    // Reset halaman saat pencarian berubah
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount($id)
    {
        $this->categoryId = (int) $id;
        $this->category   = ServiceCategory::findOrFail($this->categoryId);
    }

    public function getServicesProperty()
    {
        $query = Service::where('service_category_id', $this->categoryId)
            ->where(function ($q) {
                $q->where('name', 'like', '%'.$this->search.'%')
                  ->orWhere('description', 'like', '%'.$this->search.'%');
            });

        // Sorting
        switch ($this->sort) {
            case 'oldest':
                $query->oldest();
                break;
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
            default:
                $query->latest();
        }

        return $query->paginate(8);
    }

    public function render()
    {
        return view('livewire.services.services', [
            'category' => $this->category,
            'services' => $this->services,
        ]);
    }
}
