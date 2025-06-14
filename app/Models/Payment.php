<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model {
    protected $fillable = [
      'reservation_id', 'amount', 'payment_method', 'payment_status', 'transaction_id'
    ];

    public function reservation() { return $this->belongsTo(Reservation::class);}
}