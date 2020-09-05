<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/register.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    @if(App::getLocale() == 'ku')
        <link rel="stylesheet" href="{{asset('/css/rtl.css')}}">
    @endif

    <style>
        body {
            background: #F8F8F8;
        }
    </style>
</head>
<body>
    <header class="w-full px-10 bg-accent" style="color: #F8F8F8">
        <nav class="w-full flex justify-between items py-2 text-center">
            <h1>Dwarozh Jobs</h1>

            <ul class="flex">
                <li class="px-2 py-1 mx-2">
                    <a href="">Home</a>
                </li>
                <li class="px-2 py-1 mx-2 bg-primary-500 rounded-sm text-center">
                    <a href="{{ route('login') }}">Login</a>
                </li>
            </ul>
        </nav>
    </header>
    <section class="w-full px-3 md:px-10">
        <div id="app">
{{--            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">--}}
{{--                <div class="container">--}}
{{--                    <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                        {{ config('app.name', 'Laravel') }}--}}
{{--                    </a>--}}
{{--                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
{{--                        <span class="navbar-toggler-icon"></span>--}}
{{--                    </button>--}}

{{--                    <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                        <!-- Left Side Of Navbar -->--}}
{{--                        <ul class="navbar-nav mr-auto">--}}

{{--                        </ul>--}}

{{--                        <!-- Right Side Of Navbar -->--}}
{{--                        <ul class="navbar-nav ml-auto">--}}
{{--                            <!-- Authentication Links -->--}}
{{--                            @guest--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                                </li>--}}
{{--                                @if (Route::has('register'))--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                    </li>--}}
{{--                                @endif--}}
{{--                            @else--}}
{{--                                <li class="nav-item dropdown">--}}
{{--                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                        {{ Auth::user()->name }}--}}
{{--                                    </a>--}}

{{--                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                                        <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                           onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                            {{ __('Logout') }}--}}
{{--                                        </a>--}}

{{--                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                                            @csrf--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endguest--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </nav>--}}

            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </section>

    <script>
        window._locale = '{{ app()->getLocale() }}';
        window._translations = {!! cache('translations') !!};
    </script>
</body>
</html>
