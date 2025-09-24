<?php

namespace App\Livewire\Doctors;

use App\Models\Doctor;
use Livewire\Component;

class Schedule extends Component
{
    public function render()
    {
        return view('livewire.doctors.schedule', [
            'doctors' => Doctor::with(['specialty', 'schedules'])->latest()->get(),
        ]);
    }
}
