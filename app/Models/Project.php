<?php

namespace App\Models;

use App\Enums\ProjectStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Project extends Model
{
    use HasFactory;
    use HasUlids;

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

    public function getProductionDateAttribute(): string
    {
        $date = Carbon::parse($this->attributes['production_date']);
        return $date->format('M Y');
    }
}
