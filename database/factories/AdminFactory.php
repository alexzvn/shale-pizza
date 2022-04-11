<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => '$2y$10$ULvDkEm1Lx1AXfVZQMn71eUlyBE3G7DJ7IQ0tAmhwK5vOOp30eQLO', // password
            'remember_token' => Str::random()
        ];
    }
}
