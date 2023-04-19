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
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->name);
            }
            $model->slug = Str::slug($model->slug);

            if (empty($model->color)) {
                $model->color = CategoryColors::OTHER;
            } elseif (is_string($model->color)) { // If its string, it will be probably string (came with an api)
                if(isset(CategoryColors::list()[$model->color])) { // If given color is LARAVEL add it should be #FB503B
                    $model->color = CategoryColors::list()[$model->color];
                }
                $model->color = self::convertToColor($model->color); // If given color is #123456, save it
            }

            if (empty($model->order)) {
                $model->order = 999;
            }
        });

        static::updating(function ($model) {
            if (!empty($model->color)) {
                $model->color = self::convertToColor($model->color);
            }
        });
    }
}
