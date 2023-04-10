@extends('components.master')
@section('title', ' | Blog | ' . $post->name)
@section('content')
    <div class="flex gap-x-4 text-xs w-full mt-3 justify-around items-end">
        <a class="text-base font-bold tracking-tight text-gray-900" href="{{ route('blog.index') }}">
            <i class="fa-solid fa-arrow-left"></i>
            Back To Wall
        </a>
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $post->name }}</h2>
        <a class="text-sm font-bold tracking-tight text-gray-400 hidden lg:block" href="{{ route('blog.category.show', ['slug' => $post->category->slug]) }}">
            {{ $post->category->name }}
        </a>
    </div>
    <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-y-16 gap-x-8 border-t pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3" style="border-color: {{ $post->category->color }}"></div>
    @if(count($post->images) > 0)
        <div class="bg-contain bg-center bg-no-repeat min-h-full h-60" style="background-image: url('{{ asset("storage/" . $post->images->random()->path) }}')"></div>
    @else
        <div class="bg-contain bg-cover bg-no-repeat min-h-full h-60" style="background-image: url('{{ asset("images/logo/default-banner-full.jpg") }}')"></div>
    @endif
    <div class="mx-auto max-w-7xl px-6 lg:px-8 mt-3 mb-10 sm:mb-16 ">{!! $post->text !!}</div>
@endsection
