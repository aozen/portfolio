<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'status' => Status::class
    ];

    /**
     * The default folder to store images for the model.
     *
     * @var string
     */

    protected static string $defaultImageFolder = 'images/posts';

    public function category(): BelongsTo
    {
        return $this->belongsTo(
            related: Category::class,
            foreignKey: 'category_id',
            ownerKey: 'id'
        );
    }

    public function images(): HasMany
    {
        return $this->hasMany(
            related: Image::class,
            foreignKey: 'model_id'
        )->where('model_name', 'Post');
    }
}
