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
            ["name" => "Shubrā al Khaymah"], 
            ["name" => "Ḩalwān"], 
            ["name" => "Al Maḩallah al Kubrá"], 
            ["name" => "Ţanţā"], 
            ["name" => "Asyūţ"], 
            ["name" => "Al Fayyūm"], 
            ["name" => "Az Zaqāzīq"], 
            ["name" => "Al Ajamī"], 
            ["name" => "Kafr ad Dawwār"], 
            ["name" => "Damanhūr"], 
            ["name" => "Al Minyā"], 
            ["name" => "Mallawī"], 
            ["name" => "Damietta"], 
            ["name" => "Qinā"], 
            ["name" => "Banī Suwayf"], 
            ["name" => "Shibīn al Kawm"], 
            ["name" => "Banhā"], 
            ["name" => "Kafr ash Shaykh"], 
            ["name" => "Disūq"], 
            ["name" => "Mīt Ghamr"], 
            ["name" => "Munūf"], 
            ["name" => "Fāqūs"], 
            ["name" => "Qalyūb"], 
            ["name" => "Jirjā"], 
            ["name" => "Akhmīm"], 
            ["name" => "Al Badrashayn"], 
            ["name" => "Al Khānkah"], 
            ["name" => "Izbat al Burj"], 
            ["name" => "Kirdāsah"], 
            ["name" => "Abnūb"], 
            ["name" => "Al Minshāh"], 
            ["name" => "Al Qurayn"], 
            ["name" => "Al Balyanā"], 
            ["name" => "Al Ayyāţ"], 
            ["name" => "Al Badārī"], 
            ["name" => "Kafr al Kurdī"], 
            ["name" => "Abū Qīr"], 
            ["name" => "Al Karnak"], 
            ["name" => "Mīt Namā"], 
            ["name" => "Banī Murr"], 
            ["name" => "Al Madāmūd"], 
            ["name" => "Birqāsh"], 
            ["name" => "Kafr Ţaḩlah"]
        ];

        \DB::table('cities')->insert($cities);
    }
}
