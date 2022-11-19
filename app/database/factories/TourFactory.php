<?php

namespace Database\Factories;

use App\Models\TourCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tour>
 */
class TourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $file = Storage::allFiles('public/Tour/');
        $images = preg_replace('/public\//', '', $file);

        $photo = [];
        for($i = 0; $i < random_int(1,4); $i++){
            $photo[$i] = $images[random_int(0,count($images)-1)];
        }

        return [
            'name' => fake()->sentence(3),
            'info' => fake()->paragraph(1),
            'price' => fake()->numberBetween(0,5000),
            'photo' => json_encode($photo),
            'date_start' => fake()->date(),
            'duration' => fake()->time(),
            'category_id' => TourCategory::query()->get()->random()->id
        ];
    }
}
