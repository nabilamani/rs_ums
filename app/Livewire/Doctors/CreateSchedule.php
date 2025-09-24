<?php

namespace App\Livewire\Doctors;

use App\Models\Doctor;
use App\Models\Schedule;
use Livewire\Component;

class CreateSchedule extends Component
{
    public Doctor $doctor;
    public array $days = [];

    public function mount(Doctor $doctor)
    {
        $this->doctor = $doctor;

        // Initialize 7 days with default structure
        $dayNames = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        
        foreach ($dayNames as $day) {
            $this->days[$day] = [
                'is_active' => false,
                'slots' => [],
            ];
        }

        // Load existing schedules from database
        $existingSchedules = $doctor->schedules->groupBy('day_of_week');
        
        foreach ($existingSchedules as $day => $schedules) {
            $this->days[$day]['is_active'] = true;
            $this->days[$day]['slots'] = [];
            
            foreach ($schedules as $schedule) {
                $this->days[$day]['slots'][] = [
                    'start_time' => $schedule->start_time,
                    'end_time' => $schedule->end_time,
                ];
            }
        }
    }

    public function addSlot($day)
    {
        // Add new time slot with empty times
        $this->days[$day]['slots'][] = [
            'start_time' => '',
            'end_time' => ''
        ];
    }

    public function removeSlot($day, $index)
    {
        // Remove specific slot and reindex array
        unset($this->days[$day]['slots'][$index]);
        $this->days[$day]['slots'] = array_values($this->days[$day]['slots']);
        
        // If no slots left, deactivate the day
        if (empty($this->days[$day]['slots'])) {
            $this->days[$day]['is_active'] = false;
        }
    }

    public function updatedDays($value, $key)
    {
        // Handle day activation/deactivation
        if (str_ends_with($key, '.is_active')) {
            $dayKey = explode('.', $key)[0];
            
            if ($value === true) {
                // When day is activated, add empty slot if none exists
                if (empty($this->days[$dayKey]['slots'])) {
                    $this->days[$dayKey]['slots'][] = [
                        'start_time' => '',
                        'end_time' => ''
                    ];
                }
            } else {
                // When day is deactivated, clear all slots
                $this->days[$dayKey]['slots'] = [];
            }
        }
    }

    public function save()
    {
        // Validate input
        foreach ($this->days as $day => $data) {
            if ($data['is_active']) {
                foreach ($data['slots'] as $index => $slot) {
                    if (empty($slot['start_time']) || empty($slot['end_time'])) {
                        session()->flash('error', 'Please fill all time fields or remove empty slots.');
                        return;
                    }
                    
                    if ($slot['start_time'] >= $slot['end_time']) {
                        session()->flash('error', 'Start time must be earlier than end time.');
                        return;
                    }
                }
            }
        }

        // Delete existing schedules for this doctor
        $this->doctor->schedules()->delete();

        // Create new schedules
        foreach ($this->days as $day => $data) {
            if ($data['is_active'] && !empty($data['slots'])) {
                foreach ($data['slots'] as $slot) {
                    if (!empty($slot['start_time']) && !empty($slot['end_time'])) {
                        Schedule::create([
                            'doctor_id' => $this->doctor->id,
                            'day_of_week' => $day,
                            'start_time' => $slot['start_time'],
                            'end_time' => $slot['end_time'],
                            'is_active' => true,
                        ]);
                    }
                }
            }
        }

        session()->flash('success', 'Schedule has been saved successfully.');
        
        // Refresh component to show updated data
        $this->mount($this->doctor);
    }

    public function render()
    {
        return view('livewire.doctors.create-schedule');
    }
}