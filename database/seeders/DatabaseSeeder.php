<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Link;
use App\Models\Post;
use App\Models\Project;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Console\View\Components\TwoColumnDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $micro_time = microtime(true);

        for ($i = 0; $i<10; $i++) {
            User::factory()->create();
        }
        $this->call([UserSeeder::class]);
        $this->printTime($micro_time, "User", $i);

        for ($i = 0; $i<15; $i++) {
            Tag::factory()->create();
        }
        $this->printTime($micro_time, "Tag", $i);

        for ($i = 0; $i<10; $i++) {
            Project::factory()->create();
        }
        $this->printTime($micro_time, "Project", $i);

        for ($i = 0; $i<20; $i++) {
            Link::factory()->create();
        }
        $this->printTime($micro_time, "Link", $i);

        for ($i = 0; $i<5; $i++) {
            Category::factory()->create();
        }
        $this->printTime($micro_time, "Category", $i);

        for ($i = 0; $i<50; $i++) {
            Post::factory()->create();
        }
        $this->printTime($micro_time, "Post", $i);

        $this->forgetCache();
    }

    public function printTime(&$micro_time, $factory_name, $count)
    {
        $ms_time = number_format((microtime(true) - $micro_time) * 1000, 0);
        $each_time = number_format(str_replace(',', '', $ms_time) / $count, 2);
        $text = $this->generateText($factory_name, $count, $each_time);

        with(new TwoColumnDetail($this->command->getOutput()))->render(
            $text,
            "<fg=gray>$ms_time ms</> <fg=green;options=bold>DONE</>"
        );
        $micro_time = microtime(true);
    }

    public function generateDots($dot_count): string
    {
        return "<fg=gray>" . $dot_count . "</>";
    }

    public function generateText($factory_name, $count, $each_time): string
    {
        $text = $factory_name . " Factory";
        $dots = str_repeat('.', 50 - strlen($text));
        $text .= $this->generateDots($dots);
        $text .= $count . " created";
        $dots = str_repeat('.', 100 - strlen($text));
        $text .= $this->generateDots($dots);
        $text .= $each_time . " ms for each";
        return $text;
    }

    public function forgetCache()
    {
        Cache::forget('projects');
        Cache::forget('all_posts');
    }
}
