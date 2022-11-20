<?php

namespace Database\Factories;

use App\Models\PlaceCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use MStaack\LaravelPostgis\Geometries\Point;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place>
 */
class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $file = Storage::allFiles('public/Place/');
        $images = preg_replace('/public\//', '', $file);

        $photo = [];
        for($i = 0; $i < random_int(1,5); $i++){
            $photo[$i] = $images[random_int(0,count($images)-1)];
        }

        $latitude = fake()->latitude(42.98061903443898, 42.98096824556592);
        $longitude = fake()->longitude(47.4856036845059, 47.49370339105104);
        return [
            'name' => fake()->sentence(3),
            'info' => fake()->paragraph(1),
            'geo' => json_encode(['latitude' =>$latitude, 'longitude'=> $longitude]),
            'date_start' => fake()->boolean()? fake()->dateTimeBetween(now(), '+4 week') : null,
            'photo' => json_encode($photo),
            'price' => fake()->numberBetween(0,5000),
            'category_id' => PlaceCategory::query()->get()->random()->id
        ];
    }
}
