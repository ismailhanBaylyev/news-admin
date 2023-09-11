<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\News;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    protected $model = News::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id'=>$this->faker->numberBetween($min = 1, $max = 5),
            'name'=>$this->faker->words(5, true),
            'slug'=>$this->faker->words(1, true),
            'content'=>$this->faker->sentence(45),
            'sort'=>$this->faker->unique()->randomDigit,
            'status'=>$this->faker->boolean(),
        ];
    }
}
