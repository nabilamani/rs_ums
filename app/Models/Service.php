<?php

// app/Models/Service.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'service_category_id',
        'name',
        'description',
        'details',
        'room',
        'base_price',
        'is_active',
    ];

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }
}

