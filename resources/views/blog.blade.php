<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css', 'resources/js/app.js')
    <title>Blog Posts</title>
</head>
<body>
<div class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Blog Page</h2>
            <p class="mt-2 text-lg leading-8 text-gray-600">Blog desc</p>
        </div>
        <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-y-16 gap-x-8 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            <article class="flex max-w-xl flex-col items-start justify-between">
                <div class="group relative">
                    <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                        <a href="#" class="text-xs">
                            Category Name
                        </a>
                    </h3>
                    <h4 class="mt-3">
                        <a href="#" class="text-2xl">
                            Post Title
                        </a>
                    </h4>
                    <p class="mt-5 text-sm leading-6 text-gray-600 line-clamp-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
                <div class="flex items-center gap-x-4 text-xs mx-auto mt-3">
                    <time datetime="2023-03-09" class="text-gray-500">Mar 9, 2023</time>
                </div>
                <div class="relative mt-3 flex items-center gap-x-4">
                    <img src="https://picsum.photos/500/200" alt="">
                </div>
            </article>
        </div>
    </div>
</div>
</body>
</html>
