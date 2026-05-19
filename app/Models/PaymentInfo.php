<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentInfo extends Model
{
    use HasFactory;

    // These fields can be mass-assigned (saved via Controller)
    protected $fillable = [
        'name_on_card',
        'card_number',
        'expiration_month',
        'expiration_year',
        'security_code',
        'billing_country',
        'billing_address_1',
        'billing_address_2',
        'city',
        'state',
        'zip_code',
        'has_flight_protection',
        'total_amount',
        'traveler_id',
    ];
}