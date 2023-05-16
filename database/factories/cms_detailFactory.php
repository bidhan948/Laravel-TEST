<?php

namespace Database\Factories;

use App\Models\cms;
use App\Models\user_category;
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
        $cms = cms::factory()->create();

        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence,
            'cms_id' => $cms->id,
            'user_category_id' => function () use ($cms) {
                return user_category::factory()->create(['user_id' => $cms->user_id])->id;
            }
        ];
    }
}
