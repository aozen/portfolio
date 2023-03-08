<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;
    use HasUlids;

    protected $table = 'tags';

    protected $fillable = [
        'name',
        'image_path',
    ];

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Project::class,
            foreignPivotKey: 'tag_id'
        );
    }
}
