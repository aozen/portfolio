<?php

namespace App\Models;

use App\Enums\ProjectStatus;
use App\Observers\ProjectObserver;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use HasUlids;
    use SoftDeletes;

    protected $table = 'projects';

    protected $fillable = [
        'name',
        'description',
        'status',
        'order',
        'production_date',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
        'production_date' => 'datetime',
        'status' => ProjectStatus::class,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'deleted_at',
    ];

    /**
     * The default folder to store images for the model.
     *
     * @var string
     */
    protected static string $defaultImageFolder = 'images/projects';

    public function links(): HasMany
    {
        return $this->hasMany(
            related: Link::class,
            foreignKey: 'project_id'
        );
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Tag::class,
            foreignPivotKey: 'project_id'
        );
    }

    public function images(): HasMany
    {
        return $this->hasMany(
            related: Image::class,
            foreignKey: 'model_id'
        )->where('model_name', 'Project');
    }

    public function getProductionDateAttribute(): string
    {
        $date = Carbon::parse($this->attributes['production_date']);
        return $date->format('M Y');
    }

    protected static function boot()
    {
        parent::boot();

        static::observe(ProjectObserver::class);
    }
}
