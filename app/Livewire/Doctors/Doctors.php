<?php

namespace App\Livewire\Doctors;

use App\Models\Doctor;
use Flux\Flux;
use Livewire\Component;
use Livewire\WithPagination;

class Doctors extends Component
{
    use WithPagination;         // ✅ Aktifkan pagination

    // Dengarkan event dari komponen CreateDoctor agar list auto refresh
    protected $listeners = ['doctorAdded' => '$refresh'];

    // id dokter yang akan dihapus
    public ?int $deleteId = null;

    // Untuk reset ke halaman 1 saat ada update (opsional)
    protected $paginationTheme = 'tailwind'; // atau 'bootstrap' sesuai kebutuhan

    public function render()
    {
        return view('livewire.doctors.doctors', [
            // ✅ Gunakan paginate(12)
            'doctors' => Doctor::with('specialty')
                ->latest()
                ->paginate(12),
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
