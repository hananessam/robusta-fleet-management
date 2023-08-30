<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stop extends Model
{
    use HasFactory;

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function city_from()
    {
        return $this->belongsTo(City::class, 'city_from_id');
    }

    public function city_to()
    {
        return $this->belongsTo(City::class, 'city_to_id');
    }

    public function user_seats()
    {
        return $this->hasMany(UserSeat::class);
    }
}
