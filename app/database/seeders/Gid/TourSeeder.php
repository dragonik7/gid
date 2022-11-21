<?php

namespace Database\Seeders\Gid;

use App\Models\Place;
use App\Models\Tour;
use App\Models\TourPlace;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryNames = [
            'Спортивный',
            'Познавательный',
            'Развлекательный',
            'Быстрый',
            'Морской',
            'Горный'
        ];

        foreach ($categoryNames as $name) {
            DB::table('tour_categories')->insert(['name' => $name]);
        }
        Tour::factory(10)->create();
        for ($i = 1; $i < 11; $i++) {
            for ($j = 1; $j < random_int(3,4); $j++) {

                TourPlace::create([
                    'tour_id' => $i,
                    'place_id' => Place::query()->get()->random()->id
                ]);
            }
        }
    }
}
