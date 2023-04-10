<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Link extends BaseModel
{
    use HasFactory;

    protected $table = 'links';

    protected $fillable = [
        'project_id',
        'name',
        'link',
    ];

    public $timestamps = false;
}
