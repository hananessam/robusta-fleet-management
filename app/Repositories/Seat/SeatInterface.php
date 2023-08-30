<?php

namespace App\Repositories\Seat;
use App\Models\Seat;

interface SeatInterface {
    public function models(array $where);    
    public function reserve(Seat $seat);
}