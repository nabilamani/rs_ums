<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat 100 dokter dengan spesialis acak yang sudah ada
        Doctor::factory()->count(100)->create();
    }
}
