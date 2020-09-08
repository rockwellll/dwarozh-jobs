@extends('layouts.app')

@section('title')
    {{__('page-title.register')}}
@endsection

@section('content')
    <div class="w-full flex flex-col items-center justify-center centered">

        <form
            class="w-full md:w-4/5 lg:w-2/3 text-accent text-sm md:text-base bg-white rounded-md p-1  md:p-5  shadow-lg"
            action="{{route('business-register', ['locale' => App::getLocale()])}}"
            method="POST">
            @csrf

            <input type="hidden" name="business_account" value="1">
            <div class="flex w-full flex-col items-center my-5 text-primary">
                <h1 class="text-2xl md:text-5xl">{{__('auth.create_company_account')}}</h1>
                <h2 class="text-primary-700">{{__('auth.to_post_jobs')}}</h2>
            </div>

            <div class="flex flex-col md:flex-row w-full justify-around items-center">
                <div class="flex w-4/5 md:w-2/5 flex-col">
                    <label class="mx-1" for="name">
                        {{__('auth.company_name')}}
                    </label>
                    <input
                        required
                        type="text"
                        id="name"
                        value="{{old('name')}}"
                        name="name"
                        placeholder="{{__("auth.company_name")}}"
                        class="bg-body @error('name') border-red-500 @enderror">

                    @error('name')
                    <span class="text-red-400">{{$message}}</span>
                    @enderror
                </div>
                <div class="flex w-4/5 md:w-2/5 flex-col">
                    <label for="location">
                        {{__('auth.company_location')}}
                    </label>

                    @include('partials.locations-select-input')

                    @error('location')
                    <span class="text-red-400">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="flex w-full justify-around my-4 flex-col md:flex-row items-center">
                <div class="flex w-4/5 md:w-2/5 flex-col">
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
                <div class="flex w-4/5 md:w-2/5 flex-col">
                    <label for="mobileNumber">
                        {{__('auth.mobile_number')}}
                    </label>

                    <input
                        required
                        type="text"
                        id="mobileNumber"
                        value="{{old('mobileNumber')}}"
                        name="mobileNumber"
                        placeholder="{{__("auth.mobile_number")}}"
                        class="bg-body @error('mobileNumber') border-red-500 @enderror">

                    @error('mobileNumber')
                    <span class="text-red-400">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="flex w-full justify-around my-4 flex-col md:flex-row items-center">
                <div class="flex w-4/5 md:w-2/5 flex-col">
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
                <div class="flex w-4/5 md:w-2/5 flex-col">
                    <label for="password_confirmation">
                        {{__('auth.confirm_password')}}
                    </label>
                    <input
                        required
                        autocomplete="new-password"
                        type="password"
                        id="password_confirmation"
                        value="{{old('password_confirmation')}}"
                        name="password_confirmation"
                        placeholder="{{__("auth.confirm_password")}}"
                        class="bg-body">
                </div>
            </div>

            <div class="flex w-full justify-around my-4 flex-col md:flex-row items-center">
                <div class="w-2/5"></div>
                <div class="flex w-4/5 md:w-2/5 flex-col">
                    <x-file
                        label="{{ __('auth.company_image')}}"
                        buttonLabel="{{__('auth.choose_image')}}"
                        emptyStateText="{{__('auth.no_image_selected')}}">

                    </x-file>
                </div>
            </div>

            <div class="flex flex-col items-center my-2">
                <h6 class="text-accent-800 text-md">{{__('auth.ready_to_change_future')}}</h6>
                <button class="px-3 py-2 primary-button outline-none focus:outline-none focus:shadow-outline">
                    {{__('auth.create_account')}}
                </button>
            </div>


            <div class="flex text-xs md:text-sm flex-col md:flex-row sm:mb-2 md:mb-0">
                <span>{{__('auth.want_to_apply_to_jobs')}}</span>
                <a href="{{route('register', ['locale' => App::getLocale()])}}"
                   class="link padded-underline md:mx-1">
                    {{__('auth.create_user_account')}}
                </a>
            </div>
        </form>

        <div class="w-2/3 text-sm flex mt-2 flex-col md:flex-row justify-between items-center">
            <div class="flex flex-col sm:my-2 md:my-0">
                <div class="flex">
                    <h1 class="mx-2 text-accent-800">{{__('auth.already_have_an_account')}}</h1>

                    <a class="link padded-underline"
                       href="{{route('login', ['locale' => \Illuminate\Support\Facades\App::getLocale()])}}">{{__('auth.login')}}</a>
                </div>

            </div>

            @include('partials.language-change-links', ['route' => 'register'])
        </div>
    </div>
@endsection
