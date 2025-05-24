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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('restaurant_id')->constrained('restaurants')->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('category'); // e.g., appetizer, main course, dessert
            $table->string('status')->default('available'); // available, unavailable
            $table->string('image')->nullable(); // URL or path to the image
            $table->integer('preparation_time')->default(0); // in minutes
            $table->integer('stock')->default(0); // available stock
            $table->foreignUuid('menu_id')->constrained('menus')->onDelete('cascade');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
