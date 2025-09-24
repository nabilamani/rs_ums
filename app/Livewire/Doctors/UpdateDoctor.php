<?php

namespace App\Livewire\Doctors;

use App\Models\Doctor;
use App\Models\Specialty;
use Flux\Flux;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;

class UpdateDoctor extends Component
{
    public $doctorId;
    public $specialty_id;
    public $name;
    public $email;
    public $phone;

    /** @var \Illuminate\Support\Collection */
    public $specialties = [];

    #[On('editDoctor')]
    public function editDoctor(int $id): void
    {
        $doctor = Doctor::findOrFail($id);

        // isi form dengan data dokter
        $this->doctorId     = $doctor->id;
        $this->specialty_id = $doctor->specialty_id;
        $this->name         = $doctor->name;
        $this->email        = $doctor->email;
        $this->phone        = $doctor->phone;

        // muat daftar spesialis untuk select
        $this->specialties = Specialty::orderBy('name')->get();

        // buka modal edit
        Flux::modal('editDoctor')->show();
    }

    public function update(): void
    {
        $this->validate([
            'specialty_id' => ['required','exists:specialties,id'],
            'name'         => ['required','string','max:255'],
            'email'        => [
                'required','email',
                Rule::unique('doctors','email')->ignore($this->doctorId),
            ],
            'phone'        => ['nullable','string','max:20'],
        ]);

        Doctor::findOrFail($this->doctorId)->update([
            'specialty_id' => $this->specialty_id,
            'name'         => $this->name,
            'email'        => $this->email,
            'phone'        => $this->phone,
        ]);

        // refresh daftar dokter
        $this->dispatch('doctorAdded');

        // reset form
        $this->reset(['doctorId','specialty_id','name','email','phone','specialties']);

        // flash pesan sukses
        session()->flash('success', 'Data dokter berhasil diperbarui.');

        // tutup modal
        Flux::modal('editDoctor')->close();
    }

    public function render()
    {
        return view('livewire.doctors.update-doctor');
    }
}
