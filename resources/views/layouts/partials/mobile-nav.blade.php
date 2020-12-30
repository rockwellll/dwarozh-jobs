<section class="w-full flex flex-col justify-between items-center py-4 flex md:hidden mobile--nav" x-data="{show: false}">

    <header class="flex justify-between items-center w-full">
        <h1>
            <a href="/">Dwarozh Jobs</a>
        </h1>

        <button x-show="show" @click={show=false} class="focus:outline-none hover:text-gray-700  fill-current font-3xl font-bold">

            <svg  class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>

        <button x-show="!show"  @click={show=true} class="focus:outline-none hover:text-gray-700  fill-current font-3xl font-bold">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </button>


    </header>



    <ul class="flex flex-col w-full mt-8 items-start" x-show.transition="show"
        @auth
            <li class="py-1 mx-2 bg-primary-500 rounded-sm text-center">
                <form method="POST" action="{{route('logout')}}">
                    @csrf
                    <button class="focus:outline-none">
                        {{__("auth.logout")}}
                    </button>
                </form>
            </li>

            <li class="px-2 py-1 mx-2">
                @if(auth()->user()->isBusinessUser())
                    <a href="{{route('users.business-user-profile', ['locale' => app()->getLocale()])}}">{{__('home-page.account')}}</a>
                @else
                    <a href="{{route('users.default-user-profile', ['locale' => app()->getLocale()])}}">{{__('home-page.account')}}</a>
                @endif

            </li>
        @else
            <li class="py-1 my-1 bg-primary-500 rounded-sm flex">
                <a href="{{route('login', ['locale' => app()->getLocale()])}}">{{__('auth.login')}}</a>
            </li>

            <li class="py-1 my-1 bg-primary-500 rounded-sm text-center">
                <a href="{{route('register', ['locale' => app()->getLocale()])}}">{{__('auth.signup')}}</a>
            </li>

            <li class="py-1 my-1">
                <a href="/">{{__('page-title.home')}}</a>
            </li>

            <li class="py-1 my-1">
                @if(App::getLocale() == 'ku')
                    <a
                       href="{{route(Route::current()->getName(), ['locale' => 'en'])}}">{{__('auth.view_in_another_language')}}</a>
                @else
                    <a
                       href="{{route(Route::current()->getName(), ['locale' => 'ku'])}}">{{__('auth.view_in_another_language')}}</a>
                @endif

            </li>
        @endauth
    </ul>

</section>
