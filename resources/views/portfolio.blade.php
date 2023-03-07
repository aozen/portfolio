<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, sans-serif;font-feature-settings:normal}
            .tag{padding: 10px 20px 10px 20px;background-color: rgb(246 168 82 / 75%);border-radius: 10px;margin-right: 10px;}
            hr{margin-block-start: 1em;margin-block-end: 1em;}
        </style>
    </head>
    <body>
    My Projects
    @foreach($projects as $project)
        <h2>{{$project->name}}</h2>
        <p>{{$project->description}}</p>
        <ul>
        @foreach($project->links as $link)
            <li>{{$link->name}}</li>
        @endforeach
        </ul>
        @foreach($project->tags as $tag)
            <span class="tag">{{$tag->name}}</span>
        @endforeach
        <hr>
    @endforeach
    </body>
</html>
