<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    protected $model = News::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'event_date' => $this->faker->date(),
            'message' => $this->faker->word(),
            'created_by' => $this->faker->randomNumber(),
        ];
    }
}
