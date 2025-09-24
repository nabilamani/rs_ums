<?php

namespace App\Livewire\Doctors;

use Livewire\Component;
use App\Models\Doctor;
use App\Models\Specialty;
use Flux\Flux;

class CreateDoctor extends Component
{
    public $specialty_id;
    public $name;
    public $email;
    public $phone;

    protected function rules()
    {
        return [
            'specialty_id' => 'required|exists:specialties,id',
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|unique:doctors,email',
            'phone'        => 'nullable|string|max:20',
        ];
    }

    public function save()
    {
        $this->validate();

        Doctor::create([
            'specialty_id' => $this->specialty_id,
            'name'         => $this->name,
            'email'        => $this->email,
            'phone'        => $this->phone,
        ]);

        $this->reset();

        Flux::modal('add-doctor')->close();

        session()->flash('success', 'Dokter berhasil ditambahkan.');

        $this->dispatch('doctorAdded');
    }

    public function render()
    {
        // 🔑 kirim semua spesialis ke view
        return view('livewire.doctors.create-doctor', [
            'specialties' => Specialty::orderBy('name')->get(),
        ]);
    }
}
