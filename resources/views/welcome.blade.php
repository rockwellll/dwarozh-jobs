@extends('layouts.app')

@section("content")
    <div class="w-full  flex flex-col items-center justify-center ">
{{--        @if (Route::has('login'))--}}
{{--            <div class="top-right links">--}}
{{--                @auth--}}
{{--                    <a href="{{ url('/home') }}">Home</a>--}}
{{--                @else--}}
{{--                    <a href="{{ route('login') }}">Login</a>--}}

{{--                    @if (Route::has('register'))--}}
{{--                        <a href="{{ route('register') }}">Register</a>--}}
{{--                    @endif--}}
{{--                @endauth--}}
{{--            </div>--}}
{{--        @endif--}}

        <form action="">
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 bg-white px-8 ">
                <div class=" m-2 " >
                    <input class="bg-body  text-sm  " type="text" value="Search for jobs" style="width: 18rem" >
                </div>
                <div class=" m-2" >
                    <select name="location" id="location" class="bg-body" style="width: 18rem">
                        <option value="Erbil">Erbil</option>
                        <option value="Duhok">Duhok</option>
                        <option value="Sulaimanya">Sulaimanya</option>
                        <option value="Kerkuk">Kerkuk</option>
                    </select>
                </div>
                <div class=" m-1 ">
                    <button class="px-3 py-2 primary-button focus:outline-none focus:shadow-outline" style="width: 10rem">
                       Search
                    </button>
                </div>
            </div>
        </form>

        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-9 mt-2">
            <div class="flex flex-col items-center bg-white  p-20 m-2 ">
                    <span class=" text-3xl text-gray-700 font-semibold">
                        Job Type
                    </span>
                <span class=" text-sm text-gray-900 mt-2">
                       Number
                    </span>

            </div>
            <div class="flex flex-col items-center bg-white  p-20 m-2 ">
                    <span class=" text-3xl text-gray-700 font-semibold">
                        Job Type
                    </span>
                <span class=" text-sm text-gray-900 mt-2">
                       Number
                    </span>

            </div>
            <div class="flex flex-col items-center bg-white  p-20 m-2 ">
                    <span class=" text-3xl text-gray-700 font-semibold">
                        Job Type
                    </span>
                <span class=" text-sm text-gray-900 mt-2">
                       Number
                    </span>

            </div>
            <div class="flex flex-col items-center bg-white  p-20 m-2 ">
                    <span class=" text-3xl text-gray-700 font-semibold">
                        Job Type
                    </span>
                <span class=" text-sm text-gray-900 mt-2">
                       Number
                    </span>

            </div>
            <div class="flex flex-col items-center bg-white  p-20 m-2 ">
                    <span class=" text-3xl text-gray-700 font-semibold">
                        Job Type
                    </span>
                <span class=" text-sm text-gray-900 mt-2">
                       Number
                    </span>

            </div>
            <div class="flex flex-col items-center bg-white  p-20 m-2 ">
                    <span class=" text-3xl text-gray-700 font-semibold">
                        Job Type
                    </span>
                <span class=" text-sm text-gray-900 mt-2">
                       Number
                    </span>

            </div>
            <div class="flex flex-col items-center bg-white  p-20 m-2 ">
                    <span class=" text-3xl text-gray-700 font-semibold">
                        Job Type
                    </span>
                <span class=" text-sm text-gray-900 mt-2">
                       Number
                    </span>

            </div>
            <div class="flex flex-col items-center bg-white  p-20 m-2 ">
                    <span class=" text-3xl text-gray-700 font-semibold">
                        Job Type
                    </span>
                <span class=" text-sm text-gray-900 mt-2">
                       Number
                    </span>

            </div>

            <div class="flex flex-col items-center bg-white  p-20 m-2 ">
                    <span class=" text-3xl text-gray-700 font-semibold">
                        Job Type
                    </span>
                <span class=" text-sm text-gray-900 mt-2">
                       Number
                    </span>

            </div><!--end-->

        </div>


        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-9 mt-3 ">
            <span class="pl-0 sm:pl-0 md:pl-32 lg:pl-32 ">
                <h2 class="text-3xl text-gray-900  font-semibold ">looking for people? </h2>
            </span>
            <span class="mx-0 sm:mx-0 md:mx-2  lg:mx-2">
                <button class="px-3 py-2 primary-button outline-none focus:outline-none focus:shadow-outline"  style="width: 10rem">
                   Publish a job
                </button>
            </span>
            <span class="pl-0 sm:pl-0 md:pl-32 lg:pl-20">
                <button class="px-3 py-2 primary-button focus:outline-none focus:shadow-outline" style="width: 10rem">
                   browse more job
                </button>
            </span>
        </div>

    </div>

@endsection
