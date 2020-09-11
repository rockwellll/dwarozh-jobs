@extends('layouts.app')

@section('title')
    {{__('page-title.login')}}
@endsection


@section('description')
    {{__('page-description.login')}}
@endsection

@section('content')

    <div class="w-full flex flex-col items-center justify-center centered">
        <form
            class="w-full md:w-4/5 lg:w-1/3 flex flex-col text-accent text-sm md:text-base bg-white rounded-md p-1 px-3  md:p-5  shadow-lg"
            action="{{route('login', ['locale' => App::getLocale()])}}"
            method="POST">
            @csrf

            <div class="flex w-full flex-col items-center my-5 text-primary">
                <h1 class="text-2xl md:text-3xl lg:text-5xl">{{__('auth.login_to_your_account')}}</h1>
            </div>

            <div class="flex w-full justify-around my-2 flex-col  items-center">
                <div class="flex w-full md:w-4/5 flex-col">
                    <label class="mx-1" for="email">
                        {{__('auth.email')}}
                    </label>
                    <input
                        required
                        type="email"
                        id="email"
                        value="{{old('email')}}"
                        name="email"
                        placeholder="{{__("auth.email")}}"
                        class="bg-body @error('email') border-red-500 @enderror">

                    @error('email')
                    <span class="text-red-400">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex w-full md:w-4/5 flex-col">
                    <label class="mx-1" for="password">
                        {{__('auth.password')}}
                    </label>
                    <input
                        required
                        autocomplete="new-password"
                        type="password"
                        id="password"
                        name="password"
                        placeholder="{{__("auth.password")}}"
                        class="bg-body @error('password') border-red-500 @enderror">

                    @error('password')
                    <span class="text-red-400">{{$message}}</span>
                    @enderror
                </div>

                <div class="w-full md:w-4/5 flex items-center my-2">
                    <input type="checkbox" name="remember" id="remember"/>
                    <label for="remember" class="mx-2">
                        {{__('auth.keep_me_logged_in')}}
                    </label>
                </div>
            </div>


            <button class="self-center px-5 py-2 primary-button outline-none focus:outline-none focus:shadow-outline">
                {{__('auth.login')}}
            </button>

        </form>

        <div class="w-full md:w-3/5 lg:w-1/3 text-sm flex mt-2 flex-col md:flex-row justify-between items-center">
            <div class="flex flex-col sm:my-2 md:my-0">
                <div class="flex">
                    <h1 class="mx-2 text-accent-800">{{__('auth.dont_have_account')}}</h1>

                    <a class="link padded-underline"
                       href="{{route('register', ['locale' => \Illuminate\Support\Facades\App::getLocale()])}}">{{__('auth.create_account')}}</a>
                </div>

            </div>

            @include('partials.language-change-links', ['route' => 'login'])
        </div>
    </div>
@endsection
