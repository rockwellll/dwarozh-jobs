<section class="w-full flex justify-between hidden md:flex">
    <h1>
        <a href="/">Dwarozh Jobs</a>
    </h1>
    <ul class="flex">
        @auth
            <li class="px-2 py-1 mx-2 bg-primary-500 rounded-sm text-center test">
                <form method="POST" action="{{route('logout')}}">
                    @csrf
                    <button class="nav-link focus:outline-none" role="link">
                        {{__('auth.logout')}}
                    </button>
                </form>
            </li>

            <li class="px-2 py-1 mx-2 nav-link">
                @if(auth()->user()->isBusinessUser())
                    <a href="{{route('users.business-user-profile', ['locale' => app()->getLocale()])}}">{{__('home-page.account')}}</a>
                @else
                    <a href="{{route('users.default-user-profile', ['locale' => app()->getLocale()])}}">{{__('home-page.account')}}</a>
                @endif

            </li>
        @else
            <li class="px-2 py-1 mx-2 bg-primary-500 rounded-sm text-center nav-link">
                <a href="{{route('login', ['locale' => app()->getLocale()])}}">{{__('auth.login')}}</a>
            </li>

            <li class="px-2 py-1 mx-2 bg-primary-500 rounded-sm text-center nav-link">
                <a href="{{route('register', ['locale' => app()->getLocale()])}}">{{__('auth.signup')}}</a>
            </li>

            <li class="px-2 py-1 mx-2 nav-link">
                <a href="/">{{__('page-title.home')}}</a>
            </li>
        @endauth
    </ul>
</section>
