<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use ReflectionClass;

class BaseModel extends Model
{
    protected static string $defaultImageFolder = 'images/default';

    public function getImageFolderAttribute(): string
    {
        return $this->image_folder ?? static::$defaultImageFolder;
    }

    protected static function isEnum($var): bool
    {
        $reflection = new ReflectionClass($var);
        return $reflection->isEnum();
    }
}
