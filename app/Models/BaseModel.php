<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected static string $defaultImageFolder = 'images/default';

    public function getImageFolderAttribute(): string
    {
        return $this->image_folder ?? static::$defaultImageFolder;
    }
}
