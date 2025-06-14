<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model {
    protected $fillable = [
      'user_id', 'pitch_id', 'type', 'date', 'start_time', 'end_time', 'reserved_by'
    ];

    public function user() { return $this->belongsTo(User::class); }
    public function pitch() { return $this->belongsTo(Pitch::class); }
    public function payment() { return $this->hasOne(Payment::class);}
}