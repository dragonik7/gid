<?php

namespace Database\Factories;

use App\Models\PlaceCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

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
        for ($i = 0; $i < random_int(1, 5); $i++) {
            $photo[$i] = $images[random_int(0, count($images) - 1)];
        }

        $latitude = fake()->randomFloat(15, 42.96553484386995, 42.96670757215981); //left 42.96670757215981, 47.40975072450903 right 42.96553484386995, 47.52620886719946
        $longitude = fake()->randomFloat(15,47.49559397270946, 47.5527203874339); //up 42.993327982234035, 47.461559397270946 down 42.95213940316178, 47.4927203874339
        return [
            'name' => fake()->sentence(3),
            'info' => fake()->paragraph(1),
            'geo' => json_encode(['latitude' => $latitude, 'longitude' => $longitude]),
            'date_start' => fake()->boolean() ? fake()->dateTimeBetween(now(), '+4 week') : null,
            'photo' => json_encode($photo),
            'price' => fake()->numberBetween(0, 5000),
            'category_id' => PlaceCategory::query()->get()->random()->id
        ];
    }
}
