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
        Schema::create('reservations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('restaurant_id')->constrained('restaurants')->onDelete('cascade');
            $table->integer('table_number')->unique();
            $table->foreignUuid('user_id')->constrained('users')->onDelete('cascade');
            $table->dateTime('reservation_date');
            $table->integer('number_of_people');
            $table->string('status')->default('pending'); // pending, confirmed, cancelled
            $table->string('special_requests')->nullable(); // Any special requests from the user
            $table->string('contact_number')->nullable(); // Contact number for the reservation
            $table->string('contact_email')->nullable(); // Contact email for the reservation
            $table->string('payment_status')->default('unpaid'); // unpaid, paid
            $table->string('payment_method')->nullable(); // Method of payment (e.g., credit card, cash)
            $table->string('cancellation_policy')->nullable(); // Cancellation policy details
            $table->string('cancellation_reason')->nullable(); // Reason for cancellation, if applicable
            $table->decimal('cancellation_fee', 8, 2); // Cancellation fee, if applicable
            $table->dateTime('cancellation_date')->nullable(); // Date of cancellation, if applicable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
