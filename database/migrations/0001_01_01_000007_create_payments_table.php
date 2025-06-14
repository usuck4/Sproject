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
 Schema::create('payments', function (Blueprint $table) {
    $table->id();
    $table->foreignId('reservation_id')->constrained()->onDelete('cascade');
    $table->decimal('amount', 10, 2);
    $table->string('payment_method');
    $table->string('payment_status');
    $table->string('transaction_id');
    $table->timestamps();
});



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
        
    }
};
