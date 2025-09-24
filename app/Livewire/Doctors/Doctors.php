<?php

namespace App\Livewire\Doctors;

use App\Models\Doctor;
use Flux\Flux;
use Livewire\Component;

class Doctors extends Component
{
    // Dengarkan event dari komponen CreateDoctor agar list auto refresh
    protected $listeners = ['doctorAdded' => '$refresh'];

    // id dokter yang akan dihapus
    public ?int $deleteId = null;

    public function render()
    {
        return view('livewire.doctors.doctors', [
            'doctors' => Doctor::with('specialty')->latest()->get(),
        ]);
    }

    /**
     * Buka modal konfirmasi hapus
     */
    public function confirmDelete(int $id): void
    {
        $this->deleteId = $id;
        Flux::modal('deleteDoctor')->show();
    }

    /**
     * Eksekusi hapus dokter
     */
    public function deleteDoctor(): void
    {
        Doctor::findOrFail($this->deleteId)->delete();

        $this->reset('deleteId');

        // refresh list
        $this->dispatch('doctorAdded');

        // pesan sukses
        session()->flash('success', 'Data dokter berhasil dihapus.');

        // tutup modal
        Flux::modal('deleteDoctor')->close();
    }
}
