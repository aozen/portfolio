<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Contracts\View\View;
use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Cache::remember('projects', 60*60*24*7, function () {
            return Project::with(['tags', 'images'])->with('links')->get();
        });

        return view('portfolio', ['projects' => $projects, 'portfolio_image' => $this->homeImage()]);
    }

    public function tag($slug): View
    {
        $tag = Tag::where('name', '=', $slug)->firstOrFail();
        $projects = Cache::remember('project_tag' . $tag->name, 60*60*24*7, function () use ($tag) {
            return Project::whereHas('tags', function (Builder $query) use ($tag) {
                $query->where('id', '=', $tag->id);
            })->with('tags')->with('links')->get();
        });
        return view('portfolio', ['projects' => $projects, 'tag' => $tag]);
    }

    public function homeImage()
    {
        $files = Cache::remember('image_files', 60*60*24*7, function () {
            $files = File::files(public_path('images/generated-by-ai'));
            return array_map(function ($file) {
                $image['src'] = "images/generated-by-ai/" . $file->getFilename();
                $image['alt'] = Str::replace("_", " ", $file->getFilename());
                $image['alt'] = Str::replace('.' . $file->getExtension(), '', $image['alt']);
                return $image;
            }, $files);
        });

        return $files[rand(0, count($files) - 1)];
    }
}
