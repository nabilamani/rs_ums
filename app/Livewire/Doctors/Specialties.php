<?php

namespace App\Livewire\Doctors;

use App\Models\Specialty;
use Flux\Flux;
use Livewire\Component;

class Specialties extends Component
{
    protected $listeners = ['specialtyAdded' => '$refresh'];


    public function render()
    {
        return view('livewire.doctors.specialties', [
            'specialties' => Specialty::latest()->get(),
        ]);
    }

    public ?int $deleteId = null;
    
    public function confirmDelete($id): void
    {
        $this->deleteId = $id;

        // buka modal konfirmasi hapus
        Flux::modal('deleteSpecialty')->show();
    }

    public function deleteSpecialty(): void
    {
        Specialty::findOrFail($this->deleteId)->delete();

        // reset deleteId
        $this->reset('deleteId');

        // refresh list
        $this->dispatch('specialtyAdded');

        // pesan sukses
        session()->flash('success', 'Data spesialis berhasil dihapus.');

        // tutup modal
        Flux::modal('deleteSpecialty')->close();
    }
}
