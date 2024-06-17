<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enduser>
 */
class EndUserFactory extends Factory
{
    protected $model = \App\Models\Enduser::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'username'      => $this->faker->userName,
            'password'      => $this->faker->password,
            'full_name'     => $this->faker->name,
            'phone'         => $this->faker->phoneNumber,
            'email'         => $this->faker->unique()->safeEmail,
            'is_deleted'    => $this->faker->randomElement([0, 1]),
            'created_at'    => time(),
            'updated_at'    => null,
            'updated_by'    => null,
            'deleted_at'    => null,
            'deleted_by'    => null,
        ];
    }
}
