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
                    <li class="block cursor-pointer p-2 hover:bg-gray-800 hover:text-gray-300" id="title-0" onclick="showProject(0)">
                        <i class="w-8 fa-solid fa-code p-2 rounded-full mx-2"></i>
                        About Me
                    </li>
                    @foreach($projects as $key => $project)
                    <li class="block cursor-pointer p-2 hover:bg-gray-800 hover:text-gray-300" id="title-{{$key+1}}" onclick="showProject({{$key+1}})">
                            <i class="w-8 {{ $project->icon ?? "fa-solid fa-mountain-sun" }} p-2 rounded-full mx-2"></i>
                            {{ $project->name }}
                    </li>
                    @endforeach
                </ul>
            </div>
            <article id="project-0" class="flex max-w-2xl flex-col items-start h-fit p-5 col-span-2 sb-red">
                <div class="group relative w-full">
                    <div class="flex gap-x-4 text-xs w-full mt-3 flex-end justify-between items-center">
                        <a href="{{ $info['details']['who_am_i']['resume_link'] }}" download>
                            DOWNLOAD RESUME
                        </a>
                        <div class="w-2/12">
                            <img src="{{ $info['image_myself'] }}" title="Myself" alt="My selfie" class="shadow rounded-full max-w-full h-auto align-middle border-none" />
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
                @if(isset($portfolio_image))
                <div class="relative mt-3 flex items-center gap-x-4">
                    <img src="{{ asset($portfolio_image['src']) }}" alt="{{ $portfolio_image['alt'] }}" title="Generated with AI">
                </div>
                @endif
            </article>
            @foreach($projects as $key => $project)
            <article id="project-{{$key+1}}" class="hidden max-w-2xl flex-col items-start h-fit p-5 col-span-2 sb-purple1">
                <div class="group relative w-full">
                    <div class="flex gap-x-4 text-xs w-full mt-3 justify-end items-end">
                        <time datetime="2023-03-09" class="text-gray-500">{{ $project->production_date }}</time>
                    </div>
                    <h4 class="mt-3">
                        <a class="text-2xl">
                            {{$project->name}}
                        </a>
                    </h4>
                    <div class="mt-5 text-sm leading-6 text-gray-600">
                        {!! $project->description !!}
                    </div>
                </div>
                <div class="mt-5">
                    <ul>
                        @foreach($project->links as $link)
                        <li>
                            <a href="{{ $link->name }}" class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline" target="_blank">
                                @if(!empty($link->description))
                                    {{ $link->description }}
                                @elseif(str_contains($link->name, 'github.com'))
                                    Checkout Repository
                                @else
                                    Open In Web
                                @endif
                                <i class="fa-solid fa-arrow-right ml-0.5"></i>
                            </a>
                        </li>
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
                <div class="w-full relative mt-5 flex items-center gap-x-4">
                    <div id="swiper-{{ $key }}" class="swiper portfolio-swiper">
                        <div class="swiper-wrapper">
                        @foreach($project->images as $image)
                            <div class="swiper-slide">
                                <img src="{{ asset("storage/" . $image->path) }}" loading="lazy" alt="{{ $image->title }}" title="{{ $image->title }}"/>
                                <div class="swiper-lazy-preloader"></div>
                            </div>
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

                // Toggle visibility of projects. Display just one.
                let projectToDisplay = document.getElementById("project-" + projectId);
                projectToDisplay.classList.remove("hidden");
                projectToDisplay.classList.add("flex");

                // Scroll to top of the displayed project
                let topOffset = projectToDisplay.offsetTop;
                window.scrollTo({
                    top: topOffset,
                    behavior: "smooth"
                });

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
                projectDiv.scrollIntoView({ behavior: "smooth", block: "end", inline: "nearest" });
            });
        });
    </script>

@endsection
