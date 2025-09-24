<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['specialty_id', 'name', 'email', 'phone'];

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
