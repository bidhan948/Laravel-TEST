<?php

namespace Database\Factories;

use App\Models\cms;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\cms_detail>
 */
class cms_detailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence,
            'cms_id' => function () {
                return cms::factory()->create()->id;
            }
        ];
    }
}
