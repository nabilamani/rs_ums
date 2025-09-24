<?php

use App\Http\Controllers\BerandaController;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Admin\EditorDashboard;
use App\Livewire\Beritas;
use App\Livewire\Doctors\CreateSchedule;
use App\Livewire\Doctors\Doctors;
use App\Livewire\Doctors\Schedule;
use App\Livewire\Services\ServiceCategories;
use App\Livewire\Services\Services;
use App\Livewire\Doctors\Specialties;
use App\Livewire\Viewpublik\Beranda;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/profile', function () {
    return view('livewire.viewpublik.profile');
})->name('profile');

Route::get('/', [BerandaController::class, 'index'])->name('index');

// === DASHBOARD EDITOR ===
Route::middleware(['auth', 'editor'])->group(function () {
    Route::get('editor/dashboard', EditorDashboard::class)
        ->name('editor.dashboard');
});

// === DASHBOARD ADMIN ===
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', AdminDashboard::class)
        ->name('admin.dashboard');
});

// === MENU USER/EDITOR ===
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('beritas', Beritas::class)->name('beritas');

    Route::get('service-categories', ServiceCategories::class)
        ->name('servicecategories');

    // route ke halaman layanan per kategori
    Route::get('services/category/{id}', Services::class)
        ->name('services.byCategory');

    Route::get('specialties', Specialties::class)
        ->name('specialties');
    Route::get('doctors', Doctors::class)
        ->name('doctors');
    Route::get('schedules', Schedule::class)
        ->name('schedules.index'); // untuk semua dokter

    Route::get('schedules/{doctor}', CreateSchedule::class)
        ->name('schedules.show'); // untuk dokter tertentu


    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__ . '/auth.php';
