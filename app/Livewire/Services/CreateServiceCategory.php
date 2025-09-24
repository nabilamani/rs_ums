<?php

namespace App\Livewire\Services;

use App\Models\ServiceCategory;
use Flux\Flux;
use Livewire\Component;

class CreateServiceCategory extends Component
{
    public $title;
    public $description;
    public $icon;

    public function rules()
    {
        return [
            'title' => 'required|string|unique:service_categories,title',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
        ];
    }

    public function save()
    {
        $this->validate();

        // ====== Filter icon agar hanya class (jika user copy <i ...></i>) ======
        $this->icon = $this->normalizeIcon($this->icon);

        ServiceCategory::create([
            'title' => $this->title,
            'description' => $this->description,
            'icon' => $this->icon,
        ]);

        $this->reset();

        Flux::modal('add-category')->close();
        session()->flash('success', 'Kategori layanan berhasil ditambahkan.');
        $this->dispatch('serviceCategoryAdded');
    }

    private function normalizeIcon(?string $icon): ?string
    {
        if (!$icon) return null;

        // jika user paste <i class="fa-solid fa-hospital"></i>
        if (preg_match('/class\s*=\s*"([^"]+)"/i', $icon, $m)) {
            return trim($m[1]);
        }

        // jika user paste <i class='fa-solid fa-hospital'></i>
        if (preg_match("/class\s*=\s*'([^']+)'/i", $icon, $m)) {
            return trim($m[1]);
        }

        // kalau sudah cuma class, tetap dikembalikan
        return trim(strip_tags($icon));
    }

    public function render()
    {
        return view('livewire.services.create-service-category');
    }
}
