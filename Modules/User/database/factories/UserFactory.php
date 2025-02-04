<?php

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Modules\User\Models\User;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'lang' => $this->faker->randomElement(['en', 'ar']),
            'country_code' => '+20', // Default country code
            'password' => bcrypt('password123'), // Default password for testing
            'email_verification_token' => Str::random(32),
            'email_verified_at' => now(), // Simulate verified user
        ];
    }
}
