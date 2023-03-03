<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{

    protected $table = 'projects';

    protected $fillable = [
        'name',
        'description',
        'status',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    public function links(): HasMany
    {
        return $this->hasMany(Link::class);
    }
}
