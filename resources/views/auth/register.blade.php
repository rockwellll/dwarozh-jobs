@extends('layouts.app')

@section('content')
    <div style=" position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translateX(-50%) translateY(-50%);
  -webkit-transform: translate(-50%,-50%);
  transform: translate(-50%,-50%);" class="w-full flex flex-col items-center justify-center">

        <form  class="w-2/3 text-accent bg-white rounded-md p-5" action="" method="POST">
            <div class="flex flex-col items-center text-primary my-5">
                <h1 class="text-5xl">{{__('auth.create_an_account')}}</h1>
                <h2>{{__('auth.to_apply_easier')}}</h2>
            </div>

            <div class="flex w-full justify-around">
                <div class="flex w-2/5 flex-col">
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
                    class="bg-body">
                </div>
                <div class="flex w-2/5 flex-col">
                    <label for="lastName">
                        {{__('auth.last_name')}}
                    </label>
                    <input
                        type="text"
                        id="lastName"
                        value="{{old('lastName')}}"
                        placeholder="{{__("auth.last_name")}}"
                        name="lastName"
                        class="bg-body">
                </div>
            </div>
            <div class="flex w-full justify-around my-4">
                <div class="flex w-2/5 flex-col">
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
                        class="bg-body">
                </div>
                <div class="flex w-2/5 flex-col">
                    <label for="location">
                        {{__('auth.location')}}
                    </label>

                    <select name="location" id="location" class="bg-body">
                        <option value="Erbil">Erbil</option>
                        <option value="Duhok">Duhok</option>
                        <option value="Sulaimanya">Sulaimanya</option>
                        <option value="Kerkuk">Kerkuk</option>
                    </select>
                </div>
            </div>
            <div class="flex w-full justify-around my-4">
                <div class="flex w-2/5 flex-col">
                    <label class="mx-1" for="password">
                        {{__('auth.password')}}
                    </label>
                    <input
                        required
                        autocomplete="new-password"
                        type="password"
                        id="password"
                        value="{{old('password')}}"
                        name="password"
                        placeholder="{{__("auth.password")}}"
                        class="bg-body">
                </div>
                <div class="flex w-2/5 flex-col">
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

            <div class="flex w-full justify-around my-4">
                <div class="w-2/5"></div>
                <div class="flex w-2/5 flex-col">
                    <label for="file">
                        {{__('auth.resume')}}
                    </label>

                    <div class="flex">
                                            <span id="chosenFile">
    </span>

                        <input type="file" name="attachment" id="file" style="display: none;">
                    </div>
                    {{--                    <input--}}
                    {{--                        required--}}
                    {{--                        autocomplete="new-password"--}}
{{--                        type="password"--}}
{{--                        id="password_confirmation"--}}
{{--                        value="{{old('password_confirmation')}}"--}}
{{--                        name="password_confirmation"--}}
{{--                        placeholder="{{__("auth.confirm_password")}}"--}}
{{--                        class="bg-body">--}}
                </div>
            </div>

            <div class="flex flex-col items-center">
                <h6 class="text-gray-600 text-md">{{__('auth.ready_to_find_your_future')}}</h6>
                <button class="px-3 py-2 bg-primary text-white rounded-md mt-2">
                    {{__('auth.create_account')}}
                </button>
            </div>
        </form>

       <div class="w-2/3 text-sm flex mt-2">
           <h1 class="mx-2 text-gray-600">{{__('auth.already_have_an_account')}}</h1>

           <a class="link" href="{{route('login')}}">{{__('auth.login')}}</a>
       </div>
    </div>
    {{--    <example-component></example-component>--}}

    {{--    <div class="container">--}}
    {{--        <div class="row justify-content-center">--}}
    {{--            <div class="col-md-8">--}}
    {{--                <div class="card">--}}
    {{--                    <div class="card-header">{{ __('Register') }}</div>--}}

    {{--                    <div class="card-body">--}}
    {{--                        <form method="POST" action="{{ route('register') }}">--}}
    {{--                            @csrf--}}

    {{--                            <div class="form-group row">--}}
    {{--                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

    {{--                                <div class="col-md-6">--}}
    {{--                                    <input id="name" type="text"--}}
    {{--                                           class="form-control @error('name') is-invalid @enderror" name="name"--}}
    {{--                                           value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

    {{--                                    @error('name')--}}
    {{--                                    <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                    </span>--}}
    {{--                                    @enderror--}}
    {{--                                </div>--}}
    {{--                            </div>--}}

    {{--                            <div class="form-group row">--}}
    {{--                                <label for="email"--}}
    {{--                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

    {{--                                <div class="col-md-6">--}}
    {{--                                    <input id="email" type="email"--}}
    {{--                                           class="form-control @error('email') is-invalid @enderror" name="email"--}}
    {{--                                           value="{{ old('email') }}" required autocomplete="email">--}}

    {{--                                    @error('email')--}}
    {{--                                    <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                    </span>--}}
    {{--                                    @enderror--}}
    {{--                                </div>--}}
    {{--                            </div>--}}

    {{--                            <input type="hidden" name="buissness_account" value="1">--}}

    {{--                            <div class="form-group row">--}}
    {{--                                <label for="password"--}}
    {{--                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

    {{--                                <div class="col-md-6">--}}
    {{--                                    <input id="password" type="password"--}}
    {{--                                           class="form-control @error('password') is-invalid @enderror" name="password"--}}
    {{--                                           required autocomplete="new-password">--}}

    {{--                                    @error('password')--}}
    {{--                                    <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                    </span>--}}
    {{--                                    @enderror--}}
    {{--                                </div>--}}
    {{--                            </div>--}}

    {{--                            <div class="form-group row">--}}
    {{--                                <label for="password-confirm"--}}
    {{--                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

    {{--                                <div class="col-md-6">--}}
    {{--                                    <input id="password-confirm" type="password" class="form-control"--}}
    {{--                                           name="password_confirmation" required autocomplete="new-password">--}}
    {{--                                </div>--}}
    {{--                            </div>--}}

    {{--                            <div class="form-group row mb-0">--}}
    {{--                                <div class="col-md-6 offset-md-4">--}}
    {{--                                    <button type="submit" class="btn btn-primary">--}}
    {{--                                        {{ __('Register') }}--}}
    {{--                                    </button>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </form>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection
