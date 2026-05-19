<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traveler extends Model
{
    use HasFactory;

    // These fields can be mass-assigned (saved via Controller)
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'country_code',
        'phone_number',
        'gender',
        'date_of_birth',
    ];
}