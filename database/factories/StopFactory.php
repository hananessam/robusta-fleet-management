<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Trip;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stop>
 */
class StopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $datetime_from = $this->faker->dateTimeBetween(now(), '+1 week');
        $datetime_to = $this->faker->dateTimeBetween($datetime_from, Carbon::createFromDate($datetime_from)->addHours(5));
        return [
            'trip_id' => Trip::pluck('id')->random(),
            'city_from_id' => City::pluck('id')->random(),
            'city_to_id' => City::pluck('id')->random(),
            'datetime_from' => $datetime_from,
            'datetime_to' => $datetime_to,
        ];
    }
}
