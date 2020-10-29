@extends('layouts.app')

@section('title')
    {{__('page-title.home')}}
@endsection

@section('description')

@endsection

@section("content")
    <div class="w-full flex flex-col items-center justify-center"  x-data="{tab:false}" >

        <div class="w-full md:w-11/12 xl:w-8/12 flex-col justify-center items-center">
            <form action="" class="flex flex-col md:flex-row justify-around items-center bg-white rounded-md">
                <div class="flex flex-col md:flex-row w-full md:w-8/12 px-3 md:px-0">
                    <div class=" m-2 w-full">
                        <input class="bg-body text-sm" type="text" placeholder="{{__('home-page.Search for jobs')}}">
                    </div>
                    <div class=" m-2 w-full">
                        @include('partials.locations-select-input')
                    </div>
                </div>

                <button class="px-3 py-2 my-1 primary-button focus:outline-none focus:shadow-outline"
                        style="width: 10rem">
                    {{__('home-page.Search')}}
                </button>
            </form>

            <div class="flex flex-col justify-center items-center w-full" x-show="!tab">
                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3  gap-9 mt-2 w-10/12 md:w-full content-center">
                    @foreach($jobTypes as $type )
                        @if( $loop->index <9 )
                            <div
                                class="flex flex-col justify-center items-center bg-white h-48 p-4 m-2 shadow rounded-md shadow-md self-center">
                                <header class="w-full text-center text-2xl xl:text-3xl text-gray-700 font-semibold">
                                    <h1>
                                        {{__('home-page.job_types')[$type->name]}}
                                    </h1>
                                </header>
                                <em class=" text-sm text-gray-900 mt-2">
                                    {{__('home-page.Number')}}
                                </em>

                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="flex flex-col justify-center items-center w-full" x-show="tab">
                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3  gap-9 mt-2 w-10/12 md:w-full content-center">
                    @foreach($jobTypes as $type )

                            <div
                                class="flex flex-col justify-center items-center bg-white  h-48 p-4 m-2 shadow rounded-md shadow-md self-center">
                                <header class="w-full text-center text-2xl xl:text-3xl text-gray-700 font-semibold">
                                   <h1>
                                       {{__('home-page.job_types')[$type->name]}}
                                   </h1>
                                </header>
                                <em class=" text-sm text-gray-900 mt-2">
                                    {{__('home-page.Number')}}
                                </em>

                            </div>

                    @endforeach
                </div>
            </div>

            <div class="w-full flex justify-between px-4 text-sm">
                <div class="flex flex-row items-center">
                  <span>
                    {{__('home-page.looking for people')}}
                  </span>
                    <a class="link padded-underline mx-0 mt-2 sm:mx-0 md:mx-2: md:mt-0  lg:mx-2" href="">
                        {{__('home-page.Publish a job')}}
                    </a>
                </div>


                <button x-show="!tab" @click="tab = !tab" class="px-3 py-2 primary-button focus:outline-none focus:shadow-outline"
                        style="width: 10rem  ">

                    {{__('home-page.browse more job')}}
                </button>

                <button x-show="tab" @click="tab = !tab" class="px-3 py-2 primary-button focus:outline-none focus:shadow-outline"
                        style="width: 10rem  ">

                    Show Less
                </button>
            </div>
            <div class="text-sm">
                @include('partials.language-change-links', ['route' => 'home'])
            </div>
        </div>
    </div>

@endsection
