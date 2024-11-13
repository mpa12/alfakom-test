<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsHasCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Авторы

        $author1 = User::factory()->create([
            'name' => 'Author 1',
            'email' => 'author+1@gmail.com',
        ]);

        $author2 = User::factory()->create([
            'name' => 'Author 2',
            'email' => 'author+2@gmail.com',
        ]);

        // Категории

        $categories = NewsCategory::factory()->count(3)->create([
            'created_by' => $author1->id,
            'parent_id' => null,
        ]);

        // Новости

        $news = News::factory()->count(5)->create([
            'created_by' => $author1->id,
        ]);

        // Категории новостей

        /** @var News $post */
        foreach ($news as $post) {
            $categoriesCount = random_int(1, $categories->count());

            $selectedCategories = $categories->random($categoriesCount);

            foreach ($selectedCategories as $category) {
                NewsHasCategory::create([
                    'category_id' => $category->id,
                    'news_id' => $post->id,
                ]);
            }
        }
    }
}
