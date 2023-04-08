<?php

namespace App\Http\Traits;

use App\Models\Image;
use Illuminate\Support\Str;
use Symfony\Component\Uid\Ulid;

trait ImageTrait
{
    private function saveImages(array $files, $record = null): void
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
            $path = $file->store($image_folder, 'public');
            $title = $file->getClientOriginalName();
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
