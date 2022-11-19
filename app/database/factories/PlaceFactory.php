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
        for($i = 0; $i < random_int(1,4); $i++){
            $photo[$i] = $images[random_int(0,count($images)-1)];
        }

        $latitude = fake()->latitude(43.740940,46.728409);
        $longitude = fake()->longitude(41.672912,48.666751);
        return [
            'name' => fake()->sentence(3),
            'info' => fake()->paragraph(1),
            'geo' => json_encode(['longitude'=> $longitude, 'latitude' =>$latitude]),
            'photo' => json_encode($photo),
            'price' => fake()->numberBetween(0,5000),
            'category_id' => PlaceCategory::query()->get()->random()->id
        ];
    }
}
