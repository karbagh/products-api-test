<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use App\Models\ProductTranslation;
use Database\Factories\ProductTranslationFactory;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Product::factory(50)->create([
            'category_id' => Category::factory()->create()
        ])->each(function ($product) {
            $translations = ProductTranslation::factory(2)
                ->create()
                ->each(function ($translation, $locale) {
                    $locales = ['hy', 'en'];
                    $translation->locale = $locales[$locale];
                    $translation->name = fake()->randomElement(
                        ProductTranslationFactory::TRANSLATIONS[$locales[$locale]]
                    );
                });
            $product->translations()->saveMany($translations);
        });
    }
}
