<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Traveler;
use App\Models\PaymentInfo;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    // Show the checkout form
    public function show()
    {
        return view('checkout'); // <-- renders resources/views/checkout.blade.php
    }

    // Handle form submission
    public function store(Request $request)
    {
        // Validate all input
        $validator = Validator::make($request->all(), [
            // Traveler Info
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|min:2|max:255',
            'email' => 'required|email|max:255',
            'country_code' => 'required|string',
            'phone_number' => 'required|string|min:7|max:15',
            'gender' => 'required|in:male,female',
            'dob_month' => 'required|integer|between:1,12',
            'dob_day' => 'required|integer|between:1,31',
            'dob_year' => 'required|integer|min:1900|max:' . date('Y'),

            // Payment Info
            'name_on_card' => 'required|string|max:255',
            'card_number' => 'required|string|min:13|max:19',
            'exp_month' => 'required|integer|between:1,12',
            'exp_year' => 'required|integer|min:' . date('Y') . '|max:' . (date('Y') + 10),
            'cvv' => 'required|string|min:3|max:4',
            'billing_country' => 'required|string',
            'billing_address_1' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip_code' => 'required|string|max:20',
            'has_protection' => 'sometimes|boolean',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Save traveler
        $traveler = Traveler::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name ?? null,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'country_code' => $request->country_code,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'date_of_birth' => "{$request->dob_year}-{$request->dob_month}-{$request->dob_day}",
        ]);

        // Calculate total
        $baseFare = 358.40;
        $protectionFee = $request->has_protection ? 31.00 : 0;
        $total = $baseFare + $protectionFee;

        // Save payment info
        PaymentInfo::create([
            'name_on_card' => $request->name_on_card,
            'card_number' => $request->card_number, // ⚠️ Encrypt in production!
            'expiration_month' => $request->exp_month,
            'expiration_year' => $request->exp_year,
            'security_code' => $request->cvv, // ⚠️ Don't store in prod!
            'billing_country' => $request->billing_country,
            'billing_address_1' => $request->billing_address_1,
            'billing_address_2' => $request->billing_address_2 ?? null,
            'city' => $request->city,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'has_flight_protection' => $request->has_protection ?? false,
            'total_amount' => $total,
            'traveler_id' => $traveler->id,
        ]);

        // Redirect to success page
        return redirect()->route('checkout.success')->with('message', 'Booking saved successfully!');
    }
}