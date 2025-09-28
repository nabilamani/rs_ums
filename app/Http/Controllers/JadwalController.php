<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Specialty;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data doctors dengan relasi specialty dan schedules yang aktif
        $doctors = Doctor::with([
            'specialty',
            'schedules' => function ($query) {
                $query->where('is_active', true)
                    ->orderBy('day_of_week')
                    ->orderBy('start_time');
            }
        ])->get();

        // Ambil semua specialties untuk filter
        $specialties = Specialty::orderBy('name')->get();

        // Hitung total jadwal aktif HARI INI
        $today = strtolower(now()->format('l')); // contoh: monday
        $todayActiveCount = $doctors->sum(function ($doctor) use ($today) {
            return $doctor->schedules
                ->where('day_of_week', $today)
                ->count();
        });

        // Jika request AJAX (untuk filter)
        if ($request->ajax()) {
            return $this->filterDoctors($request, $doctors, $specialties);
        }

        // Ambil nilai max updated_at dari tabel schedules
        $lastUpdatedRaw = DB::table('schedules')->max('updated_at');

        // Pastikan null check, lalu parse ke Carbon
        $lastUpdated = $lastUpdatedRaw ? Carbon::parse($lastUpdatedRaw) : null;

        return view('livewire.viewpublik.jadwaldokter', compact(
            'doctors',
            'specialties',
            'todayActiveCount',   // kirim ke Blade
            'lastUpdated'
        ));
    }

    public function filterDoctors(Request $request, $doctors = null, $specialties = null)
    {
        if (!$doctors) {
            $doctors = Doctor::with([
                'specialty',
                'schedules' => function ($query) {
                    $query->where('is_active', true)
                        ->orderBy('day_of_week')
                        ->orderBy('start_time');
                }
            ])->get();
        }

        $filtered = $doctors;

        // Filter by specialty
        if ($request->has('specialty') && $request->specialty != '') {
            $filtered = $filtered->where('specialty_id', $request->specialty);
        }

        // Filter by day
        if ($request->has('day') && $request->day != '') {
            $filtered = $filtered->filter(function ($doctor) use ($request) {
                return $doctor->schedules->where('day_of_week', $request->day)
                    ->where('is_active', true)
                    ->count() > 0;
            });
        }

        // Filter by search query
        if ($request->has('search') && $request->search != '') {
            $search = strtolower($request->search);
            $filtered = $filtered->filter(function ($doctor) use ($search) {
                return strpos(strtolower($doctor->name), $search) !== false ||
                    strpos(strtolower($doctor->specialty->name), $search) !== false;
            });
        }

        return response()->json([
            'doctors' => $filtered->values(),
            'count' => $filtered->count()
        ]);
    }

    // Method untuk mendapatkan jadwal dokter berdasarkan ID
    public function getDoctorSchedule($id)
    {
        $doctor = Doctor::with([
            'specialty',
            'schedules' => function ($query) {
                $query->where('is_active', true)
                    ->orderBy('day_of_week')
                    ->orderBy('start_time');
            }
        ])->findOrFail($id);

        return response()->json($doctor);
    }

    // Method untuk API endpoint (optional)
    public function apiIndex(Request $request)
    {
        $doctors = Doctor::with([
            'specialty',
            'schedules' => function ($query) {
                $query->where('is_active', true)
                    ->orderBy('day_of_week')
                    ->orderBy('start_time');
            }
        ]);

        // Apply filters if provided
        if ($request->has('specialty_id') && $request->specialty_id != '') {
            $doctors->where('specialty_id', $request->specialty_id);
        }

        if ($request->has('day') && $request->day != '') {
            $doctors->whereHas('schedules', function ($query) use ($request) {
                $query->where('day_of_week', $request->day)
                    ->where('is_active', true);
            });
        }

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $doctors->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhereHas('specialty', function ($q) use ($search) {
                        $q->where('name', 'LIKE', "%{$search}%");
                    });
            });
        }

        $result = $doctors->get();

        $specialties = Specialty::orderBy('name')->get();

        return response()->json([
            'doctors' => $result,
            'specialties' => $specialties,
        ]);
    }
}
