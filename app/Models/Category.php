<?php

namespace App\Models;

use App\Http\Traits\ColorTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Enums\CategoryColors;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Category extends BaseModel
{
    use HasFactory;
    use HasUlids;
    use ColorTrait;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'color',
        'order',
    ];

    protected $casts = [
        'status' => CategoryColors::class,
    ];

    /**
     * The default folder to store images for the model.
     *
     * @var string
     */
    protected static string $defaultImageFolder = 'images/categories';

    public function posts(): HasMany
    {
        return $this->hasMany(
            related: Post::class,
            foreignKey: 'category_id'
        );
    }

    public function images(): HasMany
    {
        return $this->hasMany(
            related: Image::class,
            foreignKey: 'model_id'
        )->where('model_name', 'Category');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = empty($model->slug) ? Str::slug($model->name) : Str::slug($model->slug);

            $colorMapping = CategoryColors::list();
            $model->color = self::convertToColor(
                $colorMapping[$model->color]
                ?? $colorMapping[mb_strtoupper($model->name)]
                ?? $model->color
            );

            $model->order = empty($model->order) ? 999 : $model->order;
        });
        static::updating(function ($model) {
            if (!empty($model->color)) {
                $model->color = self::convertToColor($model->color);
            }
        });
    }
}
