<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Club extends Model {
    protected $fillable = ['name', 'address', 'category_id'];
    public function category() { return $this->belongsTo(Category::class); }
    public function pitches() { return $this->hasMany(Pitch::class); }
    public function owner() { return $this->hasOne(ClubOwner::class);}
}