<?php

namespace App\Livewire\Services;

use App\Models\ServiceCategory;
use Flux\Flux;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;

class EditServiceCategory extends Component
{
    public $title;
    public $description;
    public $icon;
    public $categoryId;

    #[On('editServiceCategory')]
    public function editCategory($id): void
    {
        $serviceCategory = ServiceCategory::findOrFail($id);
        $this->categoryId  = $serviceCategory->id;
        $this->title       = $serviceCategory->title;
        $this->description = $serviceCategory->description;
        $this->icon        = $serviceCategory->icon;

        Flux::modal('editServiceCategory')->show();
    }

    public function update(): void
    {
        $this->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('service_categories', 'title')->ignore($this->categoryId),
            ],
            'description' => ['nullable', 'string'],
            'icon'        => ['nullable', 'string', 'max:255'],
        ]);

        // ====== Normalisasi icon ======
        $this->icon = $this->normalizeIcon($this->icon);

        ServiceCategory::findOrFail($this->categoryId)->update([
            'title'       => $this->title,
            'description' => $this->description,
            'icon'        => $this->icon,
        ]);

        $this->dispatch('serviceCategoryUpdated');
        $this->reset(['title', 'description', 'icon', 'categoryId']);
        session()->flash('success', 'Kategori layanan berhasil diperbarui.');
        Flux::modal('editServiceCategory')->close();
    }

    private function normalizeIcon(?string $icon): ?string
    {
        if (!$icon) return null;

        if (preg_match('/class\s*=\s*"([^"]+)"/i', $icon, $m)) {
            return trim($m[1]);
        }
        if (preg_match("/class\s*=\s*'([^']+)'/i", $icon, $m)) {
            return trim($m[1]);
        }

        return trim(strip_tags($icon));
    }

    public function render()
    {
        return view('livewire.services.edit-service-category');
    }
}
