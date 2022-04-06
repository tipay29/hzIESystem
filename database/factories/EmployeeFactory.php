<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => mt_rand(1,9999),
            'name' => $this->faker->name,
            'phone' => mt_rand(1,9999999999),
            'job_id' => mt_rand(1,5),
            'building_id' => mt_rand(1,7),
            'user_id' => 1,
        ];
    }
}
