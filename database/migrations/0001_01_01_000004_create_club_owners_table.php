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
 Schema::create('club_owners', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->foreignId('club_id')->constrained()->onDelete('cascade');
    $table->string('status')->default('active');
    $table->json('permissions')->nullable();
    $table->timestamps();
    $table->unique(['user_id', 'club_id']);
});



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('club_owners');
        
    }
};
