<?php

namespace App\Livewire\Doctors;

use App\Models\Specialty;
use Flux\Flux;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;

class UpdateSpecialty extends Component
{
    public $name;
    public $description;
    public $icon;           // <-- tambahkan properti icon
    public $specialtyId;

    #[On('editSpecialty')]
    public function editSpecialty($id): void
    {
        $specialty = Specialty::findOrFail($id);

        $this->specialtyId  = $specialty->id;
        $this->name         = $specialty->name;
        $this->description  = $specialty->description;
        $this->icon         = $specialty->icon; // <-- isi default

        Flux::modal('editSpecialty')->show();
    }

    public function update(): void
    {
        $this->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('specialties', 'name')->ignore($this->specialtyId),
            ],
            'description' => ['nullable', 'string'],
            'icon'        => ['nullable', 'string', 'max:255'], // <-- validasi icon
        ]);

        // filter icon agar hanya class
        $this->icon = $this->normalizeIcon($this->icon);

        Specialty::findOrFail($this->specialtyId)->update([
            'name'        => $this->name,
            'description' => $this->description,
            'icon'        => $this->icon,
        ]);

        $this->dispatch('specialtyAdded');

        // reset form
        $this->reset(['name', 'description', 'icon', 'specialtyId']);

        session()->flash('success', 'Data spesialis berhasil diperbarui.');

        Flux::modal('editSpecialty')->close();
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

        // kalau sudah cuma class
        return trim(strip_tags($icon));
    }

    public function render()
    {
        return view('livewire.doctors.update-specialty');
    }
}
