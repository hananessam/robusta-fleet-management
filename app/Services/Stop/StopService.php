<?php

namespace App\Services\Trip;

use App\Http\Resources\TripResource;
use App\Repositories\Trip\TripInterface;

class TripService 
{
    public function __construct(public TripInterface $tripInterface) 
    {
    }

    // get included stops according to user's search
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
