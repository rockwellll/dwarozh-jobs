@extends('layouts.app')

@section('content')
    <header>
        <h1 class="text-xl md:text-2xl lg:text-4xl">
            {{__('users/default-user.welcome_back', ['name' => $user->name])}}
        </h1>

        <nav class="w-full bg-white rounded-md shadow p-4">
            <ul class="flex justify-start">
                <li>
                    <a class="link text-primary no-underline"
                       href="{{route('jobs.index',['locale' => app()->getLocale()])}}">
                        {{__('users/default-user.jobs')}}
                    </a>
                </li>
                <li class="mx-2">
                    <a class="link text-primary no-underline" href="">
                        {{__('users/default-user.companies')}}
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <main class="bg-white rounded mt-5 p-4">
        <header>
            <h1 class="text-accent text-xl md:text-2xl">
                {{__('users/default-user.what_you_like_to_do', ['name' => $user->name])}}
            </h1>
        </header>

        <main class="flex flex-col md:flex-row w-full px-2">
            <aside class="w-full md:w-2/12">
                <ul class="flex flex-col">
                    <li class="flex w-full justify-between items-center my-2  border-l border-primary px-1 pb-1">
                        <a class="text-xl"
                           href="{{route('users.default-user-profile', ['locale' => app()->getLocale()])}}">
                            {{__('users/default-user.profile')}}
                        </a>

                        <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </li>

                    <li class="flex w-full justify-between items-center my-2 border-b border-gray-400 pb-1">
                        <a class="text-xl" href="?tab=favorites">
                            {{__('users/default-user.favorite_jobs')}}
                        </a>

                        <svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </li>


                    <li class="flex w-full justify-between items-center my-2  border-b border-gray-400 pb-1">
                        <a class="text-xl" href="?tab=update">
                            {{__('users/default-user.update_information')}}
                        </a>

                        <svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                        </svg>
                    </li>


                    <li class="flex w-full justify-between items-center my-2  border-b border-gray-400 pb-1">
                        <a class="text-xl" href="?tab=applications">
                            {{__('users/default-user.applications')}}
                        </a>

                        <svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                                  clip-rule="evenodd"></path>
                            <path
                                d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"></path>
                        </svg>
                    </li>

                    {{--                    <li class="flex w-full justify-between items-center my-2">--}}
                    {{--                        <a class="text-xl text-red-400" href="?tab=danger">--}}
                    {{--                            {{__('users/default-user.danger_zone')}}--}}
                    {{--                        </a>--}}
                    {{--                    </li>--}}

                </ul>
            </aside>

            <section class="w-full md:w-10/12 p-3 px-5">
                @if(empty(request()->getQueryString()))
                    @include('users.profiles.partials.show-detail')
                @elseif(request()->query('tab') == "favorites")
                    @include('users.profiles.partials.favorites')
                @elseif(request()->query('tab') == "update")
                    @include('users.profiles.partials.update-info')
                @endif
            </section>
        </main>
    </main>
@endsection

@push('scripts')
    <script src="{{asset('js/register.js')}}" defer></script>
@endpush
