<?php

namespace Database\Factories;

use App\Enums\CategoryColors;
use App\Enums\PostStatus;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $name = $this->faker->word();

        return [
            'category_id' => Category::inRandomOrder()->first(),
            'name' => $name,
            'slug' => Str::slug($name),
            'text' => $this->faker->text(300),
            'status' => Arr::random(PostStatus::cases()),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
