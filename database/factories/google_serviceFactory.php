<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\google_service>
 */
class google_serviceFactory extends Factory
{
    /**
     * Define the model's default state.
     * Database\Factories\google_serviceFactory
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'token' => Str::random(10),
            'user_id' => function () {
                return User::factory()->create()->id;
            }
        ];
    }
}
