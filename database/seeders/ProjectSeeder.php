<?php

namespace Database\Seeders;

use App\Enums\ProjectStatus;
use App\Models\Project;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        $project_samples = [
            [
                'name' => 'Covid 19 Charts',
                'description' => 'The purpose of this project is to gather information about the number of Covid-19 cases, recoveries, and deaths in Turkey. The data will be obtained through an API connection, and will include both daily and cumulative figures. After the data is collected, it will be presented in charts for easy analysis and visualization.',
                'status' => ProjectStatus::ACTIVE,
                'links' => [
                    [
                        'name' => 'https://aliozendev.com/covid-19/',
                    ],
                    [
                        'name' => 'https://github.com/aozen/covid-19',
                    ],
                ],
                'tags' => Tag::whereIn('name', ['PHP', 'Laravel', 'MySQL', 'Javascript', 'Chart.js'])->pluck('id'),
            ],
        ];
        foreach ($project_samples as $project_sample) {
            $project = Project::create([
                'name' => $project_sample['name'],
                'description' => $project_sample['description'],
                'status' => $project_sample['status'],
            ]);
            $project->tags()->sync($project_sample['tags']);
            $project->links()->createMany($project_sample['links']);
        }
    }
}
