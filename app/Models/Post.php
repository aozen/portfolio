<?php

namespace App\Models;

use App\Enums\PostStatus;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Post extends Model
{
    use HasFactory;
    use HasUlids;

    protected $table = 'posts';

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'status',
        'text',
    ];

    protected $casts = [
        'status' => PostStatus::class
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(
            related: Category::class,
            foreignKey: 'category_id',
            ownerKey: 'id'
        );
    }
}
