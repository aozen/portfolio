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

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $micro_time = microtime(true);

        User::factory($count = 10)->create();
        $this->printTime($micro_time, "User", $count);

        Tag::factory($count = 50)->create();
        $this->printTime($micro_time, "Tag", $count);

        Project::factory($count = 10)->create();
        $this->printTime($micro_time, "Project", $count);

        Link::factory($count = 20)->create();
        $this->printTime($micro_time, "Link", $count);

        Category::factory($count = 5)->create();
        $this->printTime($micro_time, "Category", $count);

        Post::factory($count = 50)->create();
        $this->printTime($micro_time, "Post", $count);
    }

    public function printTime(&$micro_time, $factory_name, $count)
    {
        $ms_time = number_format((microtime(true) - $micro_time) * 1000, 0);
        $each_time = (int)str_replace(',', '', $ms_time) / $count;
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
}
