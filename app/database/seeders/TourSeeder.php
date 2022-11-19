<?php

namespace Database\Seeders;

use App\Models\Tour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        foreach ($categoryNames as $name){
            DB::table('tour_categories')->insert(['name' => $name]);
        }
        Tour::factory(15)->create();
    }
}
