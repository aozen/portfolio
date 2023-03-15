<?php

namespace Database\Factories;

use App\Enums\ProjectStatus;
use App\Models\Project;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'status' => Arr::random(ProjectStatus::cases()),
            'order' => $this->faker->numberBetween(1, 10000),
            'production_date' => $this->faker->optional($weight = 5/10)->dateTimeBetween('-6 year', 'now'),
            'deleted_at' => $this->faker->optional($weight = 1/10)->dateTimeBetween('-1 year', 'now'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Project $project) {
            $project->tags()->saveMany(Tag::inRandomOrder()->take(rand(2, 5))->get());
        });
    }
}
