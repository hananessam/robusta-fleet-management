<?php

namespace App\Repositories\Seat;

use App\Models\UserSeat;
use App\Repositories\Base\BaseRepository;
use App\Models\Seat;

class SeatRepository extends BaseRepository implements SeatInterface
{
    public $model;
    public function __construct(Seat $model, public UserSeat $userSeat)
    {
        $this->model = $model;
    }

    public function models($request)
    {
        //  filter by
        $models = $this->model->where(function ($query) use ($request) {
            // trip id
            if($request->trip_id) {
                $query->whereHas('bus.trips', function ($query) use ($request) {
                    $query->where('id', $request->start_station);
                });
            }
        })->with($request->with ?: []);

        return dd($models->toSql());
    }

    public function reserve($user_id, $seat_id, $stop_id)
    {
        $model = \DB::transaction(function () use ($user_id, $seat_id, $stop_id) {
            $model = $this->userSeat->create([
                'user_id' => $user_id,
                'seat_id' => $seat_id,
                'stop_id' => $stop_id
            ]);

            return $model;
        });

        return $model;
    }
}
