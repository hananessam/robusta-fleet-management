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
        $models = $this->model->where(function ($query) use ($request) {
            if($request->date_time_from) {
                $query->whereDate('date_time_from', '>=', $request->date_time_from)
                    ->whereHas('available_seats');
            }
        })->with($request->with ?: []);

        return $models->get();
    }
}
