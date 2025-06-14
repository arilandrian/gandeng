<?php

namespace Database\Factories;

use App\Models\Review;
use App\Models\User;    // Import model User
use App\Models\Campaign; // Import model Campaign
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Pastikan ada User (donatur) dan Campaign untuk dihubungkan
        $user = User::factory()->create(['role' => 'donatur']);
        $campaign = Campaign::factory()->create(['status' => 'active']);

        return [
            'user_id' => $user->id,
            'campaign_id' => $campaign->id,
            'rating' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->paragraph(),
        ];
    }
}