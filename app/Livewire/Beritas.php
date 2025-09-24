<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Beritas extends Component
{
    public $date;

    public function mount()
    {
        $this->date = now()->format('Y-m-d');
    }

    public function getDateAsCarbon()
    {
        return Carbon::parse($this->date);
    }

    public function render()
    {
        return view('livewire.beritas');
    }
}