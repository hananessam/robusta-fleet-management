<?php

namespace App\Repositories\Seat;

use App\Repositories\Base\BaseRepository;
use App\Models\Seat;

class SeatRepository extends BaseRepository implements SeatInterface
{
    public $model;
    public function __construct(Seat $model)
    {
        $this->model = $model;
    }

    public function models($request)
    {
        $models = $this->model->where(function ($query) use ($request) {
            if($request->id) {
                $query->where('id', $request->id);
            }
            if($request->is_available) {
                $query->where('is_available', 1);
            }
        })->with($request->with ?: []);

        return $models->get();
    }

    public function reserve($seat)
    {
        $model = \DB::transaction(function () use ($seat) {
            $model = $seat->update([
                'is_available' => 0
            ]);

            // reservation logic

            return $model;
        });

        return $model;
    }
}
