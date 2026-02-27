<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarouselSlide>
 */
class CarouselSlideFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image_path' => 'carousel-slides/' . $this->faker->image('storage/app/public/carousel-slides', 640, 480, null, false),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'is_active' => true,
            'sort_order' => $this->faker->numberBetween(1, 100),
        ];
    }
}
