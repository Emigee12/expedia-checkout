<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payment_infos', function (Blueprint $table) {
            $table->id();
            
            // Card Details
            $table->string('name_on_card');
            $table->string('card_number'); // ⚠️ In production, encrypt this!
            $table->string('expiration_month');
            $table->string('expiration_year');
            $table->string('security_code'); // ⚠️ In production, do NOT store or hash it
            
            // Billing Address
            $table->string('billing_country');
            $table->string('billing_address_1');
            $table->string('billing_address_2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');
            
            // Booking Details
            $table->boolean('has_flight_protection')->default(false);
            $table->decimal('total_amount', 10, 2); // Stores final price like 389.40
            
            // Link to Traveler
            $table->foreignId('traveler_id')->constrained()->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_infos');
    }
};