<?php

namespace App\Observers;

use App\Models\Project;
use Illuminate\Support\Facades\Cache;

class ProjectObserver
{
    public function created(Project $project): void
    {
        Cache::forget('projects');
    }

    public function updated(Project $project): void
    {
        Cache::forget('projects');
    }

    public function deleted(Project $project): void
    {
        Cache::forget('projects');
    }

    public function restored(Project $project): void
    {
        Cache::forget('projects');
    }

    public function forceDeleted(Project $project): void
    {
        Cache::forget('projects');
    }
}
