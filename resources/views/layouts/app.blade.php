<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @trixassets
    @livewireStyles

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', config('app.name'))
        | Dwarozh Jobs
    </title>

    <meta name="description" content="@yield('description')">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

@stack('scripts')
<!-- Fonts -->

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link data-turbolinks-track="true" href="{{ asset('css/main.css') }}" rel="stylesheet">

    @if(App::getLocale() == 'ku')
        <link data-turbolinks-track="true" rel="stylesheet" href="{{asset('/css/rtl.css')}}">
    @endif

    <style>
        body {
            background: #F8F8F8;
        }
    </style>
    <livewire:styles/>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.1/dist/alpine.min.js" defer></script>
</head>
<body class="antialiased">
<header class="w-full px-2 md:px-10 bg-accent" style="color: #F8F8F8">
    <nav class="main w-full px-2 md:px-0 flex justify-center items-center flex-col py-5 text-center text-md">
        @include("layouts.partials.nav")

        @include("layouts.partials.mobile-nav")
    </nav>
</header>
<section class="w-full px-3 md:px-5 lg:px-10">
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</section>


@livewireScripts
<script>
    window._locale = '{{ app()->getLocale() }}';
    window._translations = {!! cache('translations') !!};
</script>
</body>
</html>
