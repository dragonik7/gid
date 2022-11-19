<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryNames = [
            'Музей',
            'Парк',
            'Пляж',
            'Университет',
            'Аэропорт',
            'Вокзал'
        ];

        foreach ($categoryNames as $name){
            DB::table('place_categories')->insert(['name' => $name]);
        }
        Place::factory(15)->create();
    }
}
