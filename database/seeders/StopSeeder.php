<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stop;

class StopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stops = [
            [
                'trip_id' => 1,
                'city_from_id' => 1,
                'city_to_id' => 4,
                'datetime_from' => '2023-09-12 04:30',
                'datetime_to' => '2023-09-12 07:30',
            ],
            [
                'trip_id' => 1,
                'city_from_id' => 4,
                'city_to_id' => 3,
                'datetime_from' => '2023-09-12 08:00',
                'datetime_to' => '2023-09-12 11:30',
            ],
            [
                'trip_id' => 2,
                'city_from_id' => 1, // cairo
                'city_to_id' => 10, // alfayum
                'datetime_from' => '2023-09-01 04:30',
                'datetime_to' => '2023-09-01 07:30',
            ],
            [
                'trip_id' => 2,
                'city_from_id' => 10, // alfayum
                'city_to_id' => 15, // alminia
                'datetime_from' => '2023-09-12 08:00',
                'datetime_to' => '2023-09-12 11:30',
            ],
            [
                'trip_id' => 2,
                'city_from_id' => 15, // alminia
                'city_to_id' => 9, // asyut
                'datetime_from' => '2023-09-12 08:00',
                'datetime_to' => '2023-09-12 11:30',
            ],
        ];

        foreach ($stops as $key => $stop) {
            \DB::table('stops')->insert($stop);
        }
    }
}
