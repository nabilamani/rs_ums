<?php

namespace App\Livewire\Doctors;

use App\Models\Specialty;
use Flux\Flux;
use Livewire\Component;

class CreateSpecialty extends Component
{
    public $name;
    public $description;
    public $icon;

    protected function rules()
    {
        return [
            'name'        => 'required|string|unique:specialties,name',
            'description' => 'nullable|string',
            'icon'        => 'nullable|string|max:255',
        ];
    }

    public function save()
    {
        $this->validate();

        // ===== Filter icon agar hanya class (misal user copy <i ...></i>) =====
        $this->icon = $this->normalizeIcon($this->icon);

        Specialty::create([
            'name'        => $this->name,
            'description' => $this->description,
            'icon'        => $this->icon,
        ]);

        // reset input form
        $this->reset();

        // tutup modal Flux
        Flux::modal('add-specialty')->close();

        // flash message sukses
        session()->flash('success', 'Spesialis berhasil ditambahkan.');

        // trigger event agar list refresh
        $this->dispatch('specialtyAdded');
    }

    private function normalizeIcon(?string $icon): ?string
    {
        if (!$icon) return null;

        // jika user paste <i class="mdi mdi-hospital"></i>
        if (preg_match('/class\s*=\s*"([^"]+)"/i', $icon, $m)) {
            return trim($m[1]);
        }

        // jika user paste <i class='mdi mdi-hospital'></i>
        if (preg_match("/class\s*=\s*'([^']+)'/i", $icon, $m)) {
            return trim($m[1]);
        }

        // kalau sudah cuma class, tetap dikembalikan
        return trim(strip_tags($icon));
    }

    public function render()
    {
        return view('livewire.doctors.create-specialty');
    }
}
