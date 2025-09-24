<?php

namespace App\Livewire\Services;

use App\Models\Service;
use App\Models\ServiceCategory;
use Flux\Flux;
use Livewire\Component;

class CreateService extends Component
{
    public ServiceCategory $category;  // Instance kategori yang dipilih

    public $name;
    public $description;
    public $details;
    public $room;
    public $base_price = 0;
    public $is_active = true;

    // Terima instance ServiceCategory dari parent
    public function mount(ServiceCategory $category)
    {
        $this->category = $category;
    }

    protected function rules()
    {
        return [
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'details'     => 'nullable|string',
            'room'        => 'nullable|string|max:255',
            'base_price'  => 'nullable|numeric|min:0',
            'is_active'   => 'boolean',
        ];
    }

    public function save()
    {
        $this->validate();

        // service_category_id otomatis diisi dari $this->category->id
        Service::create([
            'service_category_id' => $this->category->id,
            'name'        => $this->name,
            'description' => $this->description,
            'details'     => $this->details,
            'room'        => $this->room,
            'base_price'  => $this->base_price,
            'is_active'   => $this->is_active,
        ]);

        // reset input form
        $this->reset(['name','description','details','room','base_price','is_active']);

        // tutup modal (pastikan nama sama persis dengan di Blade)
        Flux::modal('add-service')->close();

        session()->flash('success', 'Layanan baru berhasil ditambahkan.');

        // kirim event agar parent refresh daftar layanan
        $this->dispatch('serviceAdded');
    }

    public function render()
    {
        return view('livewire.services.create-service');
    }
}
