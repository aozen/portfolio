<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Console\View\Components\TwoColumnDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Uid\Ulid;

class BaseDatabaseSeeder extends Seeder
{
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

    final protected function saveImages(array $files, $record = null): void
    {
        if ($record) {
            $image_folder = $record->image_folder;
            $model_name = class_basename(get_class($record));
            $model_id = $record->id;
        } else {
            $image_folder = "images/default";
            $model_name = "Default";
            $model_id = Str::lower(Ulid::generate());
        }

        foreach ($files as $file) {
            $path = Storage::disk('public')->put($image_folder, new \Illuminate\Http\File($file));
            $title = pathinfo($file, PATHINFO_BASENAME);

            $image = new Image([
                'model_name' => $model_name,
                'model_id' => $model_id,
                'path' => $path,
                'title' => $title,
            ]);
            $image->save();
        }
    }
}
