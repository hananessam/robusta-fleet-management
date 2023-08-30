<?php

namespace App\Repositories\Trip;

use App\Repositories\Base\BaseRepository;
use App\Models\Trip;

class TripRepository extends BaseRepository implements TripInterface
{
    public $model;
    public function __construct(Trip $model)
    {
        $this->model = $model;
    }

    public function models($request)
    {
        // filter by
        $models = $this->model->where(function ($query) use ($request) {
            // start station
            if ($request->start_station) {
                $query->whereHas('stops', function ($query) use ($request) {
                    $query->where('city_from_id', $request->start_station);
                });
            }

            // end staion
            if ($request->end_station) {
                $query->whereHas('stops', function ($query) use ($request) {
                    $query->where('city_to_id', $request->end_station);
                });
            }

            // start date
            if($request->date_time_from) {
                $query->whereDate('date_time_from', '>=', $request->date_time_from)
                    ->whereHas('available_seats');
            }
        })->with($request->with ?: []);

        return $models->get();
    }
}

