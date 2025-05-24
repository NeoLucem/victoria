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
        Schema::create('owners', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('restaurant_id')->constrained('restaurants')->onDelete('cascade');
            $table->foreignUuid('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name'); // Owner's name
            $table->string('email')->unique(); // Owner's email
            $table->string('phone')->nullable(); // Owner's phone number
            $table->string('address')->nullable(); // Owner's address
            $table->string('profile_picture')->nullable(); // Owner's profile picture
            $table->string('status')->default('active'); // Status of the owner (e.g., active, inactive)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owners');
    }
};
