<?php

namespace App\Http\Controllers;

use App\Enums\ProjectStatus;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Cache;

class BlogController extends Controller
{
    public function wall() : View
    {
        $posts = Cache::remember('all_posts', 60*60*24*7, function () {
            return Post::where('status', '=', ProjectStatus::ACTIVE)->with('category')->get();
        });

        return view('wall', ['posts' => $posts]);
    }
    public function category($slug) : View
    {
        $category = Category::where('slug', '=', $slug)->firstOrFail();
        $posts = Post::where('status', '=', ProjectStatus::ACTIVE)->where('category_id', '=', $category->id)->get();
        return view('wall', ['posts' => $posts, 'category' => $category]);
    }
    public function post($slug) : View
    {
        $post = Post::where('status', '=', ProjectStatus::ACTIVE)->where('slug', '=', $slug)->firstOrFail();
        return view('post', ['post' => $post]);
    }
}
