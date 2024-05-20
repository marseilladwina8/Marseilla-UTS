<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $categories = ['Wafer', 'Chiki', 'Biskuit'];
        $category = $this->faker->randomElement($categories);

        // Daftar merek Wafer
        $waferBrands = [
            'Tanggo', 'Nabati', 'Roma', 'Selamat', 'Mister Potato',
            'Gery', 'Coklat Garuda', 'Superstar', 'Astor', 'Super Wafers'
        ];

        // Daftar merek Chiki
        $chikiBrands = [
            'Chiki Balls', 'Taro', 'Qtela', 'JetZ', 'Chitato',
            'Lays', 'Doritos', 'Cheetos', 'Pringles', 'Oishi'
        ];

        // Daftar merek Biskuit
        $biskuitBrands = [
            'Marie Regal', 'Roma Malkist', 'Biskuat', 'Good Time', 'Oreo',
            'Tiger', 'Beng Beng', 'Gery Saluut', 'Astor', 'Sandwich Monde'
        ];

        $name = $category == 'Wafer'
            ? $this->faker->randomElement($waferBrands)
            : ($category == 'Chiki'
                ? $this->faker->randomElement($chikiBrands)
                : $this->faker->randomElement($biskuitBrands));

        // Deskripsi khusus untuk setiap kategori
        $description = $category == 'Wafer'
            ? 'Wafer renyah dengan berbagai rasa yang lezat.'
            : ($category == 'Chiki'
                ? 'Chiki gurih dan renyah, sempurna untuk camilan.'
                : 'Biskuit dengan berbagai rasa yang cocok untuk segala suasana.');

        return [
            'name' => $name,
            'description' => $description,
            'price' => $this->faker->numberBetween(1000, 50000),
            'image' => $this->faker->imageUrl(640, 480, 'product', true),
            'category_id' => $category == 'Wafer' ? 1 : ($category == 'Chiki' ? 2 : 3),
            'expired_at' => now()->addDays(365),
            'modified_by' => $this->faker->randomElement(['admin@gmail.com', 'user@gmail.com'])
        ];
    }
}
