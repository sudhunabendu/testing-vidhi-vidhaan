<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gemstone>
 */
class GemstoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "category_id" =>3,
            "name" => $this->faker->name(),
            "price" => $this->faker->randomFloat('10',0,2),
            "description" => $this->faker->paragraphs(200),
            "images"=> $this->faker->image(public_path("images/product_images"),800,600),
            "weight" => $this->faker->randomFloat(2, 0.1, 36.0),
            "status"=>  "Active",
        ];
    }
}
