<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css', 'resources/js/app.js')
    <title>{{ $info['full_name'] }} | {{ $info['title'] }} @yield('title')</title>
    @yield('css')
    @yield('head_js')
</head>
<body class="flex flex-col min-h-screen">
    <div class="bg-white py-6 sm:py-8">
        @yield('content')
        @include('components.footer')
    </div>
    @yield('tail_js')
</body>
</html>
