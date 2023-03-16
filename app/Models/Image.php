<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Image extends Model
{
    use HasUlids;

    protected $table = 'images';

    protected $fillable = [
        'model_name',
        'model_id',
        'path',
        'title',
    ];

    // Return the image owner data
    public function imageable(): BelongsTo
    {
        return $this->belongsTo('App\Models\\' . $this->model_name, 'model_id');
    }
}
