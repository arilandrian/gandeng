<?php

namespace Database\Factories;

use App\Models\BudgetReport;
use App\Models\Campaign; // Import model Campaign
use Illuminate\Database\Eloquent\Factories\Factory;

class BudgetReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BudgetReport::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Pastikan ada Campaign untuk dihubungkan
        $campaign = Campaign::factory()->create(['status' => 'active']);

        $expenseType = $this->faker->randomElement(['uang', 'barang', 'jasa']);
        $amount = null;
        $quantityDescription = null;

        if ($expenseType === 'uang') {
            $amount = $this->faker->numberBetween(100000, 5000000);
        } else {
            $quantityDescription = $this->faker->numberBetween(1, 50) . ' ' . $this->faker->randomElement(['buah', 'paket', 'jam kerja']);
        }

        return [
            'campaign_id' => $campaign->id,
            'report_date' => $this->faker->dateTimeBetween('-6 months', 'now')->format('Y-m-d'),
            'expense_type' => $expenseType,
            'description' => $this->faker->sentence(),
            'amount' => $amount,
            'quantity_description' => $quantityDescription,
            'proof_url' => $this->faker->boolean(70) ? 'proofs/dummy_proof.pdf' : null, // 70% kemungkinan ada bukti
        ];
    }
}