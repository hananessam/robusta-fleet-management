<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    public function stops()
    {
        return $this->hasMany(Stop::class);
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}
