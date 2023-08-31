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
        // get_available_seats
        $available_seats_data = $this->get_available_seats($request);
        $available_seats = $available_seats_data['available_seats'];

        $seats = SeatResource::collection($available_seats);
        return ['status' => 200, 'data' => ['seat' => $seats], 'errors' => []];
    }
    
    public function reserve($request) 
    {
        // get_available_seats
        $available_seats_data = $this->get_available_seats($request);
        $included_stops = $available_seats_data['included_stops'];
        $available_seats = $available_seats_data['available_seats'];
        
        // check if selected seat is available
        if(!$available_seats->contains('id', $request->seat_id)){
            return ['status' => 400, 'data' => [], 'errors' => ['error' => trans('seat not available')]];
        }

        // reserve 
        foreach ($included_stops as $key => $stop) {
            $this->seatInterface->reserve($request->user()->id, $request->seat_id, $stop->id);
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

    private function get_available_seats($request)
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

        return ['trip' => $trip, 'included_stops' => $included_stops, 'available_seats' => $available_seats];
    }
}
