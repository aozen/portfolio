<?php

namespace Database\Factories;

use App\Enums\Status;
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
        $name = $this->faker->unique()->word;

        return [
            'category_id' => Category::inRandomOrder()->first(),
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(100),
            'text' => $this->faker->text(300),
            'status' => Arr::random(Status::cases()),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
