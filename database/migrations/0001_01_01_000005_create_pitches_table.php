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
Schema::create('pitches', function (Blueprint $table) {
    $table->id();
    $table->foreignId('club_id')->constrained()->onDelete('cascade');
    $table->string('name');
    $table->text('description')->nullable();
    $table->string('image_url')->nullable();
    $table->decimal('price_per_hour', 8, 2)->nullable();
    $table->string('status')->default('available'); // available, maintenance, unavailable
    $table->timestamps();
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pitches');
        
    }
};
