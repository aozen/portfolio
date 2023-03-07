<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    use HasUlids;

    public function run()
    {
        $tag_samples = [
            [
                'name' => 'PHP',
                'image_path' => public_path('tags').'/php.png',
            ],
            [
                'name' => 'Laravel',
                'image_path' => public_path('tags').'/laravel.png',
            ],
            [
                'name' => 'MySQL',
                'image_path' => public_path('tags').'/mysql.png',
            ],
            [
                'name' => 'Javascript',
                'image_path' => public_path('tags').'/javascript.png',
            ],
            [
                'name' => 'HTML',
                'image_path' => public_path('tags').'/html.png',
            ],
            [
                'name' => 'CSS',
                'image_path' => public_path('tags').'/css.png',
            ],
            [
                'name' => 'Jquery',
                'image_path' => public_path('tags').'/jquery.png',
            ],
            [
                'name' => 'GIT',
                'image_path' => public_path('tags').'/git.png',
            ],
            [
                'name' => 'Linux',
                'image_path' => public_path('tags').'/linux.png',
            ],
            [
                'name' => 'Restful',
                'image_path' => public_path('tags').'/restful.png',
            ],
            [
                'name' => 'Redis',
                'image_path' => public_path('tags').'/redis.png',
            ],
            [
                'name' => 'Docker',
                'image_path' => public_path('tags').'/docker.png',
            ],
            [
                'name' => 'LAMP',
                'image_path' => public_path('tags').'/lamp.png',
            ],
            [
                'name' => 'Vue.js',
                'image_path' => public_path('tags').'/vue.png',
            ],
            [
                'name' => 'React.js',
                'image_path' => public_path('tags').'/react.png',
            ],
            [
                'name' => 'React Native',
                'image_path' => public_path('tags').'/react-native.png',
            ],
            [
                'name' => 'Chart.js',
                'image_path' => public_path('tags').'/chart.png',
            ],
        ];

        foreach ($tag_samples as $tag_sample) {
            $tag = Tag::create([
                'id' => $this->newUniqueId(),
                'name' => $tag_sample['name'],
                'image_path' => $tag_sample['image_path'],
            ]);
        }
    }
}
