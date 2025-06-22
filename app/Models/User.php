<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['phone', 'email', 'password'];

    public function profile() { return $this->hasOne(Profile::class); }
    public function reservations() { return $this->hasMany(Reservation::class); }
    public function clubOwner() { return $this->hasOne(ClubOwner::class)
        
        ;}
            protected static function boot()
{
    parent::boot();
    
    static::deleting(function($user) {
        $user->profile()->delete();
        // Optional: Delete other related data (tokens, posts, etc.)
        $user->tokens()->delete();
    });
}
}