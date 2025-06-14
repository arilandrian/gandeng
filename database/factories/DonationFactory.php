<?php

namespace Database\Factories;

use App\Models\Donation;
use App\Models\User;    // Import model User
use App\Models\Campaign; // Import model Campaign
use Illuminate\Database\Eloquent\Factories\Factory;

class DonationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Donation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Pastikan ada User (donatur) dan Campaign untuk dihubungkan
        $user = User::factory()->create(['role' => 'donatur']);
        $campaign = Campaign::factory()->create(['status' => 'active']); // Pastikan kampanye aktif

        $donationType = $this->faker->randomElement(['money', 'goods']);

        $amount = null;
        $paymentMethod = null;
        $itemName = null;
        $itemQuantity = null;
        $itemDescription = null;
        $itemPhotoUrl = null;

        if ($donationType === 'money') {
            $amount = $this->faker->numberBetween(10000, 500000);
            $paymentMethod = $this->faker->randomElement(['BCA', 'GoPay', 'OVO', 'DANA']);
        } else {
            $itemName = $this->faker->word() . ' ' . $this->faker->randomElement(['Buku', 'Pakaian', 'Sembako']);
            $itemQuantity = $this->faker->numberBetween(1, 20) . ' ' . $this->faker->randomElement(['buah', 'paket', 'kg']);
            $itemDescription = $this->faker->sentence();
            $itemPhotoUrl = $this->faker->boolean(50) ? 'items/dummy_item.jpg' : null;
        }

        return [
            'user_id' => $user->id,
            'campaign_id' => $campaign->id,
            'donation_type' => $donationType,
            'amount' => $amount,
            'payment_method' => $paymentMethod,
            'item_name' => $itemName,
            'item_quantity' => $itemQuantity,
            'item_description' => $itemDescription,
            'item_photo_url' => $itemPhotoUrl,
            'additional_notes' => $this->faker->boolean(50) ? $this->faker->sentence() : null,
            'status' => $this->faker->randomElement(['pending', 'confirmed']),
        ];
    }
}