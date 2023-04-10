<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class PostObserver
{
    public function created(Post $post): void
    {
        Cache::forget('all_posts');
    }

    public function updated(Post $post): void
    {
        Cache::forget('all_posts');
    }

    public function deleted(Post $post): void
    {
        Cache::forget('all_posts');
    }

    public function restored(Post $post): void
    {
        Cache::forget('all_posts');
    }

    public function forceDeleted(Post $post): void
    {
        Cache::forget('all_posts');
    }
}
