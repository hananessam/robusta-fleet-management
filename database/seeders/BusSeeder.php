<?php

namespace Database\Seeders;

use App\Models\Bus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $busses = Bus::factory()->count(5)->create();
        foreach ($busses as $bus) {
            for ($i = 1; $i <= 30; $i++) {
                $bus->seats()->create(["number" => $i]);
            }
        }
    }
}
