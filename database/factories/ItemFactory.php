<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nama' => $this->faker->word(3),
            'jenis' => $this->faker->randomElement(['elektronik', 'pakaian']),
            'kondisi' => $this->faker->randomElement(['baik', 'layak', 'rusak']),
            'keterangan' => $this->faker->paragraph(1),
            'kecacatan' => $this->faker->paragraph(1),
            'jumlah' => $this->faker->numberBetween(1, 10),
            'gambar'=> $this->faker->randomElement(['makanan.jpg','minuman.jpg'])
        ];
    }
}
