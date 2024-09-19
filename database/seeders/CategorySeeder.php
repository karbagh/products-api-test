<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryTranslation;
use Database\Factories\ProductTranslationFactory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory(50)->create([])->each(function ($category) {
            $translations = CategoryTranslation::factory(2)
                ->create()
                ->each(function ($translation, $locale) {
                    $locales = ['hy', 'en'];
                    $translation->locale = $locales[$locale];
                    $translation->name = fake()->randomElement(
                        ProductTranslationFactory::TRANSLATIONS[$locales[$locale]]
                    );
                });
            $category->translations()->saveMany($translations);
        });
    }
}
