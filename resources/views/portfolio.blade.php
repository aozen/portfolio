@extends('components.master')
@section('title', ' | Portfolio')
@section('content')
    <div class="mx-auto max-w-7xl px-6 lg:px-8 mb-10 sm:mb-16">
        <div class="mx-auto max-w-2xl lg:mx-0 grid">
            @if(isset($tag))
            <p class="mt-2 text-lg leading-8 text-gray-600">
                Filtered Tag: <span class="text-gray-800">{{ $tag->name }}</span>
            </p>

            <a class="text-base font-bold tracking-tight text-gray-900 mt-3" href="{{ route('project.index') }}">
                <i class="fa-solid fa-arrow-left"></i>
                Back To All Projects
            </a>
            @else
            <a class="text-base font-bold tracking-tight text-gray-900 mt-3" href="{{ route('blog.index') }}">
                Go To Blog
                <i class="fa-solid fa-arrow-right"></i>
            </a>
            @endif

            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl mt-10">
                My recent works
            </h2>
        </div>

        <div id="container-projects" class="mx-auto mt-3 grid max-w-2xl grid-cols-1 gap-y-16 gap-x-8 border-t border-gray-200 pt-10 sm:mt-5 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            <div class="max-w-xl col-span-1 shadow sm:shadow-md md:shadow-lg lg:shadow-xl xl:shadow-2xl border border-gray-900">
                <ul class="text-gray-700 w-full" id="title-container">
                    @foreach($projects as $key => $project)
                    <li class="block cursor-pointer p-2 hover:bg-gray-800 hover:text-gray-300" id="title-{{$key}}" onclick="showProject({{$key}})">
                            <i class="w-8 {{ $project->icon ?? "fa-solid fa-mountain-sun" }} p-2 rounded-full mx-2"></i>
                            {{ $project->name }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @if(isset($portfolio_image))
            <article id="project-info" class="flex max-w-2xl flex-col items-start h-fit p-5 col-span-2" style="box-shadow: 0 0 2px 1px #4d4d4d, 0 0 3px 2px #666666, 0 0 4px 3px #7b7b7b, 0 0 5px 4px #999999, inset 0 0 8px 0 #af3838;">
                <div class="group relative">
                    <div class="flex gap-x-4 text-xs w-full mt-3 flex-end justify-between items-center">
                        <a href="{{ $info['details']['who_am_i']['resume_link'] }}" download>
                            DOWNLOAD RESUME
                        </a>
                        <div class="w-2/12">
                            <img src="{{ $info['image_myself'] }}" title="My self but much cooler" alt="AI generated myself" class="shadow rounded-full max-w-full h-auto align-middle border-none" />
                        </div>
                    </div>
                    <h4 class="mt-3">
                        <a class="text-2xl">
                            Who Am I?
                        </a>
                    </h4>
                    <p class="mt-5 text-sm leading-6 text-gray-600">
                        {!! $info['details']['who_am_i']['description'] !!}
                    </p>
                </div>
                <div class="relative mt-3 flex items-center gap-x-4">
                    <img src="{{ asset($portfolio_image['src']) }}" alt="{{ $portfolio_image['alt'] }}" title="Generated with AI">
                </div>
            </article>
            @endif
            @foreach($projects as $key => $project)
                <article id="project-{{$key}}" class="@if(!isset($portfolio_image) && $key == 0) flex @else hidden @endif max-w-2xl flex-col items-start h-fit p-5 col-span-2" style="box-shadow: 0 0 2px 1px #4d4d4d, 0 0 3px 2px #666666, 0 0 4px 3px #7b7b7b, 0 0 5px 4px #999999, inset 0 0 8px 0 #7e00ffad;">
                    <div class="group relative">
                        <div class="flex gap-x-4 text-xs w-full mt-3 justify-between items-end">
                            <h3 class="text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                <a class="text-xs">
                                    {{$project->name}}
                                </a>
                            </h3>
                            <time datetime="2023-03-09" class="text-gray-500">{{ $project->production_date }}</time>
                        </div>
{{--                        <h4 class="mt-3">--}}
{{--                            <a class="text-2xl">--}}
{{--                                aaaaaaaaaa--}}
{{--                            </a>--}}
{{--                        </h4>--}}
                        <p class="mt-5 text-sm leading-6 text-gray-600 line-clamp-3">{{ $project->description }}</p>
                    </div>
                    <div class="mt-5">
                        <h4 class="text-gray-700 mb-2">Open In Web</h4>
                        <ul>
                            @foreach($project->links as $link)
                                <li><a href="{{ $link->name }}" target="_blank">{{ $link->description }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="mt-3">
                        @foreach($project->tags as $tag)
                            <span class="tag"></span>
                            <a href="{{ route('project.tags', ['slug' => $tag->name]) }}" class="bg-pink-400 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                                <i class="{{ $tag->icon }}"></i> {{ $tag->name }}
                            </a>
                        @endforeach
                    </div>
                    <div class="relative mt-5 flex items-center gap-x-4">
                        <div id="swiper-{{ $key }}" class="swiper portfolio-swiper">
                            <div class="swiper-wrapper">
                            @foreach($project->images as $image)
                                <img class="swiper-slide" src="{{ asset("storage/" . $image->path) }}" alt="{{ $image->title }}" title="{{ $image->title }}">
                            @endforeach
                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
@endsection

@section('tail_js')
    <script>
        let currentProjectId = null;
        const projectDivs = document.querySelectorAll("[id^='project-']");
        const container = document.getElementById("container-projects");

        function showProject(projectId) {
            if (projectId !== currentProjectId) {
                for (let i = 0; i < projectDivs.length; i++) {
                    projectDivs[i].classList.add("hidden");
                    projectDivs[i].classList.remove("flex");
                }

                let projectToDisplay = document.getElementById("project-" + projectId);
                projectToDisplay.classList.remove("hidden");
                projectToDisplay.classList.add("flex");

                currentProjectId = projectId;
            }
        }
    </script>
    <script>
        const ul = document.querySelector('#title-container');
        const lis = ul.querySelectorAll('li');

        // Maybe worst way to do this. Not sure, but it works.
        // Motto: If it works, don't change anything.
        lis.forEach((li) => {
            li.addEventListener('click', () => {
                const id = li.id.split('-')[1];
                const projectDiv = document.querySelector(`#project-${id}`);
                projectDiv.scrollIntoView({ behavior: 'smooth' });
            });
        });
    </script>

@endsection
