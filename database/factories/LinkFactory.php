<?php

namespace Database\Factories;

use App\Models\Link;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class LinkFactory extends Factory
{
    protected $model = Link::class;

    public function definition(): array
    {
        return [
            'project_id' => Project::inRandomOrder()->first(),
            'name' => $this->faker->url(),
            'description' => $this->faker->sentence(),
        ];
    }
}
