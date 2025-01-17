<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'imageable_id' =>Doctor::all()->random()->id,
            'filename' => $this->faker->randomElement(['1.jpg','2.jpg','3.jpg']),
            'imageable_type' => 'App\Models\Doctor',
        ];
    }
}
