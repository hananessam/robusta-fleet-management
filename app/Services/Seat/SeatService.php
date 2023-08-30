<?php

namespace App\Services\Seat;

use App\Http\Resources\SeatResource;
use App\Repositories\Seat\SeatInterface;
use App\Repositories\Trip\TripInterface;

class SeatService 
{
    public function __construct(public SeatInterface $seatInterface, public TripInterface $tripInterface) 
    {
    }

    public function available_seats($request) 
    {
        // trip
        $trip = $this->tripInterface->models($request);

        // stops
        $stops = $trip->first()->stops;

        // included stops
        $included_stops = $this->included_stops($stops, $request);

        // available seats
        $available_seats = $trip->first()->bus->seats()->whereDoesntHave('user_seats', function ($query) use ($request, $included_stops) {
            $query->whereIn('stop_id', $included_stops->pluck('id'));
        })->get();

        $seats = SeatResource::collection($available_seats);
        return ['status' => 200, 'data' => ['seat' => $seats], 'errors' => []];
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

    public function included_stops($stops, $request)
    {
        $starting_stop = $stops->where('city_from_id', $request->start_station)->first();
        $ending_stop = $stops->where('city_to_id', $request->end_station)->first();

        $included_stops = $stops->skipUntil(function ($stop) use ($starting_stop) {
            return $stop === $starting_stop;
        })->takeWhile(function ($stop) use ($ending_stop) {
            return $stop !== $ending_stop;
        });

        $included_stops->push($ending_stop);
        return $included_stops;
    }
}
