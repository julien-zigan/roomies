<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /** @use HasFactory<\Database\Factories\RoomFactory> */
    use HasFactory;

    public function apartment() {
        return $this->belongsTo(Apartment::class);
    }

    public function tenants() {
        return $this->hasMany(User::class,'room_id');
    }
}
