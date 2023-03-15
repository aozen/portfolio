<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

class TagFactory extends Factory
{
    protected $model = Tag::class;

    public function definition(): array
    {
        $icon_list = ["fa-brands fa-github", "fa-brands fa-php", "fa-brands fa-html5", "fa-brands fa-square-js", "fa-brands fa-linux", "fa-brands fa-laravel", "fa-brands fa-youtube", "fa-brands fa-wordpress", "fa-brands fa-docker", "fa-brands fa-react", "fa-brands fa-python", "fa-brands fa-amazon", "fa-brands fa-gitlab"];
        return [
            'name' => $this->faker->unique()->word,
            'icon' => Arr::random($icon_list),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
