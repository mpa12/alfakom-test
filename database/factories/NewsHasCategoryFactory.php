<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsHasCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsHasCategoryFactory extends Factory
{
    protected $model = NewsHasCategory::class;

    public function definition(): array
    {
        return [
            'category_id' => NewsCategory::factory(),
            'news_id' => News::factory(),
        ];
    }
}
