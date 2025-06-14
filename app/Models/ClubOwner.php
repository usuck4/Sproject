<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class ClubOwner extends Model {
    protected $fillable = ['user_id', 'club_id'];
    public function user() { return $this->belongsTo(User::class); }
    public function club() { return $this->belongsTo(Club::class);}
}