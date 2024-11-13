<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caregiver extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'specialization',
        'latitude',
        'longitude',
        'rating',
        'status',
        'experience_years',
    ];
}
