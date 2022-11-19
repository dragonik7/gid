<?php

namespace Database\Factories;

use App\Models\Place;
use App\Models\Tour;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TourPlace>
 */
class TourPlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'place_id' => Place::query()->get()->random()->id,
            'tour_id' => Tour::query()->get()->random()->id,
        ];
    }
}
