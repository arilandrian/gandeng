<?php

namespace Database\Factories;

use App\Models\Komunitas;
use App\Models\User; // Import model User
use Illuminate\Database\Eloquent\Factories\Factory;

class KomunitasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Komunitas::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Pastikan ada user dengan role 'komunitas' untuk dihubungkan
        $user = User::factory()->create(['role' => 'komunitas']);

        return [
            'user_id' => $user->id,
            'nama_organisasi' => $this->faker->company(),
            'nomor_telepon' => $this->faker->phoneNumber(),
            'kategori_organisasi' => $this->faker->randomElement(['Sosial', 'Lingkungan', 'Pendidikan', 'Kesehatan', 'Kemanusiaan']),
            'document_path' => 'documents/dummy_doc.pdf', // Path dummy
            'status_validasi' => $this->faker->randomElement(['pending', 'approved']),
        ];
    }
}