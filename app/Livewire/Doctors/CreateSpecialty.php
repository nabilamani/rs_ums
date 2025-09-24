<?php

namespace App\Livewire\Doctors;

use App\Models\Specialty;
use Flux\Flux;
use Livewire\Component;

class CreateSpecialty extends Component
{
    public $name;
    public $description;

    protected function rules()
    {
        return [
            'name'        => 'required|string|unique:specialties,name',
            'description' => 'nullable|string',
        ];
    }

    public function save()
    {
        $this->validate();

        Specialty::create([
            'name'        => $this->name,
            'description' => $this->description,
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

    public function render()
    {
        return view('livewire.doctors.create-specialty');
    }
}
