<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoryTranslation>
 */
class CategoryTranslationFactory extends Factory
{
    const TRANSLATIONS = [
        'en' => [
            'Sink Siphon',
            'Screw',
            'Latex Paint, 15L',
            'Plasterboard',
            'Profile F-47',
            'Insulation Tape',
            'Copper Wire',
            'Kitchen Faucet',
        ],
        'hy' => [
            'Սիֆոն',
            'Պտուտակ',
            'Լատեքսային ներկ, 15լ',
            'Գիպսաստվարաթուղթ',
            'Պրոֆիլ F-47',
            'Մեկուսիչ ժապավեն',
            'Պղնձե հաղորդալար',
            'Խոհանոցային ծորակ',
        ],

    ];


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $locale = $this->faker->randomElement(['en', 'hy']);

        return [
            'category_id' => Product::all()->random()->id,
            'name' => $this->faker->randomElement(self::TRANSLATIONS[$locale]),
            'locale' => $locale,
        ];
    }
}
