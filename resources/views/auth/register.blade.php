@extends('layouts.app')

@section('title')
    {{__('page-title.register')}}
@endsection

@section('description')
    {{__('page-description.register')}}
@endsection

@section('content')
    <div class="w-full flex flex-col items-center justify-center centered">

        <form
            class="w-full md:w-4/5 lg:w-2/3 text-accent text-sm md:text-base bg-white rounded-md p-1  md:p-5  shadow-lg"
            action="/{{App::getLocale()}}/register"
            method="POST">
            @csrf

            <div class="flex w-full flex-col items-center my-5 text-primary">
                <h1 class="text-4xl md:text-5xl">{{__('auth.create_an_account')}}</h1>
                <h2 class="text-primary-700">{{__('auth.to_apply_easier')}}</h2>
            </div>

            <div class="flex flex-col md:flex-row w-full justify-around items-center">
                <div class="flex w-4/5 md:w-2/5 flex-col">
                    <label class="mx-1" for="firstName">
                        {{__('auth.first_name')}}
                    </label>
                    <input
                        required
                        type="text"
                        id="firstName"
                        value="{{old('firstName')}}"
                        name="firstName"
                        placeholder="{{__("auth.first_name")}}"
                        class="bg-body @error('firstName') border-red-500 @enderror">

                    @error('firstName')
                    <span class="text-red-400">{{$message}}</span>
                    @enderror
                </div>
                <div class="flex w-4/5 md:w-2/5 flex-col">
                    <label for="lastName">
                        {{__('auth.last_name')}}
                    </label>
                    <input
                        required
                        type="text"
                        id="lastName"
                        value="{{old('lastName')}}"
                        placeholder="{{__("auth.last_name")}}"
                        name="lastName"
                        class="bg-body @error('lastName') border-red-500 @enderror">

                    @error('lastName')
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
                    <label for="location">
                        {{__('auth.location')}}
                    </label>

                    @include('partials.locations-select-input')

                    @error('location')
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
                    @include('partials.file', [
                        'label' => __('auth.resume'),
                        'buttonLabel' => __('auth.choose_resume'),
                        'emptyStateText' => __('auth.no_file_selected')
                    ])
                </div>
            </div>

            <div class="flex flex-col items-center my-2">
                <h6 class="text-accent-800 text-md">{{__('auth.ready_to_find_your_future')}}</h6>
                <button class="px-5 py-2 primary-button outline-none focus:outline-none focus:shadow-outline">
                    {{__('auth.create_account')}}
                </button>
            </div>


            <div class="flex text-xs md:text-sm flex-col md:flex-row sm:mb-2 md:mb-0">
                <span>{{__('auth.want_to_post_jobs')}}</span>
                <a href="{{route('business-register', ['locale' => App::getLocale()])}}"
                   class="link padded-underline sm:mx-2 md:mx-2">{{__('auth.create_buisness_account')}}</a>
            </div>
        </form>

        <div class="w-2/3 text-sm flex mt-2 flex-col md:flex-row justify-between items-center">
            <div class="flex flex-col my-2">
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

@push('scripts')
    <script src="{{asset('js/register.js')}}" defer></script>
@endpush
