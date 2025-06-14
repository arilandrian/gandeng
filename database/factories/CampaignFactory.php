<?php

namespace Database\Factories;

use App\Models\Campaign;
use App\Models\Komunitas; // Import model Komunitas
use Illuminate\Database\Eloquent\Factories\Factory;

class CampaignFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Campaign::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Pastikan ada Komunitas untuk dihubungkan
        $komunitas = Komunitas::factory()->create();

        return [
            'komunitas_id' => $komunitas->id,
            'title' => $this->faker->sentence(rand(3, 6)),
            'description' => $this->faker->paragraphs(rand(2, 4), true),
            'category' => $this->faker->randomElement(['Pendidikan', 'Kesehatan', 'Lingkungan', 'Kemanusiaan']),
            'location' => $this->faker->city() . ', ' . $this->faker->state(),
            'target_amount' => $this->faker->numberBetween(1000000, 50000000),
            'current_amount' => $this->faker->numberBetween(0, 40000000), // Lebih kecil dari target
            'target_items' => $this->faker->sentence(3), // Contoh: "50 Buku Tulis"
            'current_items' => $this->faker->numberBetween(0, 40) . ' ' . $this->faker->word(), // Contoh: "10 buah"
            'start_date' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'end_date' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'image_url' => 'https://picsum.photos/800/600?' . rand(1, 100), // Gambar dummy
            'document_url' => $this->faker->boolean(50) ? 'documents/dummy_proposal.pdf' : null, // 50% kemungkinan ada dokumen
            'status' => $this->faker->randomElement(['pending_validation', 'active', 'completed']),
        ];
    }
}