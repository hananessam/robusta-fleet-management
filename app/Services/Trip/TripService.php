<?php

namespace App\Services\Trip;

use App\Http\Resources\TripResource;
use App\Repositories\Trip\TripInterface;

class TripService 
{
    public function __construct(public TripInterface $tripInterface) 
    {
    }

    public function trips($request) 
    {
        $model = $this->tripInterface->models($request);

        $trip = TripResource::collection($model);
        return ['status' => 200, 'data' => ['trip' => $trip], 'errors' => []];
    }
}
