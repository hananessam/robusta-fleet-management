<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            ["name" => "Cairo"], 
            ["name" => "Giza"], 
            ["name" => "Alexandria"], 
            ["name" => "Mansoura"], 
            ["name" => "Shubra al Khaymah"], 
            ["name" => "Halwan"], 
            ["name" => "Al Mahallah al Kubra"], 
            ["name" => "Tanta"], 
            ["name" => "Asyut"], 
            ["name" => "Al Fayyum"], 
            ["name" => "Az Zaqaziq"], 
            ["name" => "Al Ajami"], 
            ["name" => "Kafr ad Dawwar"], 
            ["name" => "Damanhur"], 
            ["name" => "Al Minya"], 
            ["name" => "Damietta"], 
            ["name" => "Qina"], 
            ["name" => "Bani Suwayf"], 
            ["name" => "Shibin al Kawm"], 
            ["name" => "Banha"], 
            ["name" => "Kafr ashaykh"], 
            ["name" => "Disuq"], 
            ["name" => "Mit Ghamr"], 
            ["name" => "Munuf"], 
            ["name" => "Faqus"], 
            ["name" => "Qalyub"], 
            ["name" => "Al Badrashayn"], 
            ["name" => "Al Khankah"], 
            ["name" => "Kirdasah"], 
            ["name" => "Al Ayyat"], 
            ["name" => "Abu Qir"], 
            ["name" => "Al Karnak"],
        ];

        \DB::table('cities')->insert($cities);
    }
}
