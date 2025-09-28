<?php

namespace App\Livewire\Doctors;

use App\Models\Doctor;
use Livewire\Component;
use Livewire\WithPagination;

class Schedule extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.doctors.schedule', [
            // ✅ Ambil data dengan pagination 12 per halaman
            'doctors' => Doctor::with(['specialty', 'schedules'])
                ->latest()
                ->paginate(12),
        ]);
    }
}
