<?php

namespace Database\Factories;

use App\Models\Place;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $file = Storage::allFiles('public/Comment/');
        $images = preg_replace('/public\//', '', $file);
        return [
            'text' => fake()->text(),
            'image' => $images[random_int(0, count($images) - 1)],
            'rating' => fake()->numberBetween(1, 5),
            'user_id' => User::query()->get()->random()->id,
            'place_id' => Place::query()->get()->random()->id,
        ];
    }
}
