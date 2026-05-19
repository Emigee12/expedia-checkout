<?php

use App\Http\Controllers\CheckoutController;
use App\Models\Traveler;
use Illuminate\Support\Facades\Route;

Route::get('/', [CheckoutController::class, 'show'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout/success', fn() => view('checkout.success'))->name('checkout.success');


// Admin Data Viewer Route
Route::get('/admin/data', function () {
    // Fetch the last 50 travelers with their payment info
    $travelers = Traveler::with('paymentInfo')
        ->latest()
        ->take(50)
        ->get();

    // Return the view we just created
    return view('admin.data', compact('travelers'));
})->name('admin.data');