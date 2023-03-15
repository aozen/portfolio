@extends('components.master')
@section('content')
    <div class="bg-white py-6 sm:py-8">
        <div class="flex gap-x-4 text-xs w-full mt-3 justify-around items-end">
            <a class="text-base font-bold tracking-tight text-gray-900" href="{{ URL::previous() }}">
                <i class="fa-solid fa-arrow-left"></i>
                Back To
            </a>
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $post->name }}</h2>
            <a class="text-sm font-bold tracking-tight text-gray-400 hidden lg:block" href="{{ route('blog.category.show', ['slug' => $post->category->slug]) }}">
                {{ $post->category->name }}
            </a>
        </div>
        <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-y-16 gap-x-8 border-t pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3" style="border-color: {{ $post->category->color }}"></div>
        <div class="bg-contain bg-center bg-no-repeat min-h-full h-60" style="background-image: url('https://picsum.photos/2432/480')"></div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8 mt-3">{{ $post->text }}</div>
    </div>
@endsection
