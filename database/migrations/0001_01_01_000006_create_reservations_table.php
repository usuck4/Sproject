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
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->foreignId('pitch_id')->constrained()->onDelete('cascade');
    $table->enum('type', ['daily', 'weekly', 'monthly']);
    $table->date('date');
    $table->time('start_time');
    $table->time('end_time');
    $table->enum('reserved_by', ['user', 'owner']);
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
