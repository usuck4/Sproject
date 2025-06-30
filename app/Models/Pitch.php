<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Pitch extends Model {
    protected $fillable = ['club_id', 'name', 'description', 'image_url','price_per_hour'];
    public function club() { return $this->belongsTo(Club::class); }
    public function reservations() { return $this->hasMany(Reservation::class);}
}