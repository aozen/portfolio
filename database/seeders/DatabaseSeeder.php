<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Project;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Str;

class DatabaseSeeder extends BaseDatabaseSeeder
{
    public function run(): void
    {
        $micro_time = microtime(true);

        $count = $this->createUsers();
        $this->printTime($micro_time, "User", $count);

        $count = $this->createProjects();
        $this->printTime($micro_time, "Projects", $count);

        $count = $this->createCategories();
        $this->printTime($micro_time, "Category", $count);

        $count = $this->createPosts();
        $this->printTime($micro_time, "Post", $count);

        $this->forgetCache();
    }

    public function createUsers(): int
    {
        User::create([
            'name' => 'Ali Ozen',
            'email' => 'admin@aliozendev.com',
            'password' => bcrypt('test'),
            'is_admin' => 1,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);

        return 1;
    }

    public function createProjects(): int
    {
        $projects = self::getProjects();
        foreach ($projects as $project) {
            $newProject = Project::create([
                'name' => $project['name'],
                'description' => $project['description'],
                'status' => $project['status'],
                'icon' => $project['icon'],
                'production_date' => $project['production_date'],
                'order' => $project['order'],
            ]);

            foreach ($project['tags'] as $tag) {
                $tag = Tag::firstOrCreate(['name' => $tag]);
                $newProject->tags()->attach($tag);
            }
            $this->saveImages($project['images'], $newProject);
        }

        return count($projects);
    }

    public function createCategories(): int
    {
        $categories = self::getCategories();

        foreach($categories as $category) {
            Category::create($category);
        }

        return count($categories);
    }

    public function createPosts(): int
    {
        $categories = Category::all()->pluck('id', 'slug');

        $posts = self::getPosts();
        foreach ($posts as $post) {
            $newPost = Post::create([
                'category_id' => $categories[$post['category']],
                'name' => $post['name'],
                'status' => $post['status'],
                'description' => $post['description'],
                'text' => $post['text'],
            ]);

            $this->saveImages($post['images'], $newPost);
        }
        return 1;
    }

    public static function getProjects(): array
    {
        return config('projects');
    }

    public static function getCategories(): array
    {
        return config('categories');
    }

    public static function getPosts(): array
    {
        return config('posts');
    }
}
