<?php

namespace App\Services\Seat;

use App\Http\Resources\SeatResource;
use App\Repositories\Seat\SeatInterface;

class SeatService 
{
    public function __construct(public SeatInterface $tripInterface) 
    {
    }

    public function reserve($request) 
    {
        $request->merge([
            'is_available' => 1
        ]);
        $models = $this->tripInterface->models($request);

        $seat = $models->first();
        if(!$seat){
            return ['status' => 400, 'data' => [], 'errors' => ['error' => trans('not available')]];
        }
        
        $reserve = $this->tripInterface->reserve($seat);
        
        if(!$reserve){
            return ['status' => 500, 'data' => [], 'errors' => ['error' => trans('server error')]];
        }

        return ['status' => 200, 'data' => [], 'errors' => []];
    }
}
