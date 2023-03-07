<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasUlids;

    protected $table = 'tags';

    protected $fillable = [
        'name',
        'image_path',
    ];
}
