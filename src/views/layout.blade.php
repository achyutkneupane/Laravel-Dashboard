<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>@yield('page_title', 'Undefined') | {{ config('app.name', 'Laravel Dashboard') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <style>
        [x-cloak] {
            display: none !important;
        }

        @auth

        .body-comp {
            left: 280px;
            width: calc(100% - 280px);
        }

        @media (max-width: 768px) {
            .body-comp {
                left: 0;
                width: 100%;
            }
        }

        @endauth

    </style>

    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/sass/sidebar.scss'])

    @stack('styles')

    @livewireStyles
</head>
<body>
<div id="app" class="vh-100 d-flex flex-row overflow-hidden">
    @auth
        <livewire:sidebar />
    @endauth
    <main class="position-absolute body-comp top-0">
        @auth
            <livewire:navbar :title="app()->view->getSections()['page_title'] ?? 'Undefined'" />
            <div class="container-fluid w-100">
                {{ $slot }}
            </div>
        @else
            {{ $slot }}
        @endauth
    </main>
</div>

@livewireScripts()

@stack('scripts')
</body>
</html>
