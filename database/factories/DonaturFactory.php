<?php

namespace Database\Factories;

use App\Models\Donatur;
use App\Models\User; // Import model User
use Illuminate\Database\Eloquent\Factories\Factory;

class DonaturFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Donatur::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Pastikan ada user dengan role 'donatur' untuk dihubungkan
        $user = User::factory()->create(['role' => 'donatur']);

        return [
            'user_id' => $user->id,
            'domisili' => $this->faker->city(),
        ];
    }
}