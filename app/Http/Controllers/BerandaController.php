<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        // Ambil 6 layanan terbaru
        $categories = ServiceCategory::latest()->take(6)->get();
        $gradients  = config('gradients');

        // Kirim ke view 'home'
        return view('livewire.viewpublik.beranda', compact('categories','gradients'));
    }
}
