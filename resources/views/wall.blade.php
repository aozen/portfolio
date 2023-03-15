@extends('components.master')
@section('title', ' | Wall')
@section('content')
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0 grid">
            @if(isset($category))
            <a class="text-base font-bold tracking-tight text-gray-900 mt-3" href="{{ route('blog.index') }}">
                <i class="fa-solid fa-arrow-left"></i>
                Back To All Categories
            </a>
            @else
            <a class="text-base font-bold tracking-tight text-gray-900 mt-3" href="{{ route('project.index') }}">
                <i class="fa-solid fa-arrow-left"></i>
                Back To Projects
            </a>
            @endif
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl mt-10">
                {{ $category->name ?? "All Posts" }}
            </h2>
        </div>
        <div class="mx-auto mt-3 grid max-w-2xl grid-cols-1 gap-y-16 gap-x-8 border-t border-gray-200 pt-10 sm:mt-5 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @foreach($posts as $post)
                <article class="flex max-w-xl flex-col items-start justify-between p-5" style="box-shadow:
                0 0 2px 1px #4d4d4d,
                0 0 3px 2px #666666,
                0 0 4px 3px #7b7b7b,
                0 0 5px 4px #999999,
                inset 0 0 8px 0 {{$post->category->color}};">
                    <div class="group relative">
                        <div class="flex gap-x-4 text-xs w-full mt-3 justify-between items-end">
                            <h3 class="text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                <a href="{{ route('blog.category.show', ['slug' => $post->category->slug]) }}" class="text-xs">
                                    {{$post->category->name}}
                                </a>
                            </h3>
                            <time datetime="2023-03-09" class="text-gray-500">Mar 9, 2023</time>
                        </div>
                        <h4 class="mt-3">
                            <a href="{{ route('blog.post.show', ['slug' => $post->slug]) }}" class="text-2xl">
                                {{ $post->name }}
                            </a>
                        </h4>
                        <p class="mt-5 text-sm leading-6 text-gray-600 line-clamp-3">{{ $post->text }}</p>
                    </div>
                    <div class="relative mt-3 flex items-center gap-x-4">
                        <img src="https://picsum.photos/500/200" alt="">
                    </div>
                </article>
            @endforeach
        </div>
    </div>
@endsection
