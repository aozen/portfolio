<?php

namespace App\Actions;

use App\Models\Image;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class StorageImageList
{
    public function __invoke(string $disk = 'public', string $directory = 'images', int $count = 20): array
    {
        return Cache::remember('latestImages.' . $disk . '.' . $directory . '.' . $count, 60 * 60 * 24, function () use ($disk, $directory, $count) {
            $files = Storage::disk($disk)->allFiles($directory);
            $latestImagePaths = array_slice($this->sortByLastModified($files, $disk), 0, $count);

            return array_map(function ($path) use ($disk) {
                $image = Image::where('path', $path)->latest()->first();

                if ($image) {
                    $title = $image->model_name . ' - ' . $image->title;

                    return [
                        'title' => $title,
                        'value' => url(asset('storage/' . $path)),
                    ];
                }

                return null;
            }, $latestImagePaths);
        });
    }

    private function sortByLastModified(array $files, string $disk): array
    {
        usort($files, function ($a, $b) use ($disk) {
            return Storage::disk($disk)->lastModified($b) - Storage::disk($disk)->lastModified($a);
        });

        return $files;
    }
}
