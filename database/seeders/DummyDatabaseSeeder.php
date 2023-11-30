<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Link;
use App\Models\Post;
use App\Models\Project;
use App\Models\Tag;
use App\Models\User;

class DummyDatabaseSeeder extends BaseDatabaseSeeder
{
    public function run(): void
    {

        $micro_time = microtime(true);
        for ($i = 0; $i < 10; $i++) {
            User::factory()->create();
        }
        $this->call([UserSeeder::class]);
        $this->printTime($micro_time, "User", $i);

        for ($i = 0; $i < 15; $i++) {
            Tag::factory()->create();
        }
        $this->printTime($micro_time, "Tag", $i);

        for ($i = 0; $i < 10; $i++) {
            Project::factory()->create();
        }
        $this->printTime($micro_time, "Project", $i);

        for ($i = 0; $i < 20; $i++) {
            Link::factory()->create();
        }
        $this->printTime($micro_time, "Link", $i);

        for ($i = 0; $i < 5; $i++) {
            Category::factory()->create();
        }
        $this->printTime($micro_time, "Category", $i);

        for ($i = 0; $i < 50; $i++) {
            Post::factory()->create();
        }
        $this->printTime($micro_time, "Post", $i);

        $this->forgetCache();
    }
}
