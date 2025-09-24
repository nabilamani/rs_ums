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
    public $specialtyId;

    #[On('editSpecialty')]
    public function editSpecialty($id): void
    {
        $specialty = Specialty::findOrFail($id);

        $this->specialtyId  = $specialty->id;
        $this->name         = $specialty->name;
        $this->description  = $specialty->description;

        // buka modal edit
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
        ]);

        Specialty::findOrFail($this->specialtyId)->update([
            'name'        => $this->name,
            'description' => $this->description,
        ]);

        // kirim event agar daftar spesialis ter-refresh
        $this->dispatch('specialtyAdded');

        // reset form
        $this->reset(['name', 'description', 'specialtyId']);

        // pesan sukses
        session()->flash('success', 'Data spesialis berhasil diperbarui.');

        // tutup modal
        Flux::modal('editSpecialty')->close();
    }

    public function render()
    {
        return view('livewire.doctors.update-specialty');
    }
}
