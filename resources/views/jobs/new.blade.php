@extends('layouts.app')

@section('title, Hello world')


@section('content')
    <div class="w-full flex flex-col items-center justify-center">
        <header class="my-2">
            <h1 class="text-4xl md:text-5xl text-primary">
                {{__('jobs/new.post-job')}}
            </h1>
        </header>

        <main class="w-full flex justify-center my-3">
            <form
                class="w-full md:w-4/5 lg:w-2/3 text-accent text-sm md:text-base bg-white rounded-md p-1 md:p-5 shadow-lg"
                action="{{route('jobs.store', ['locale' => app()->getLocale()])}}" method="POST">

                <section class="w-full">
                    <label for="title" class="md:text-xl">
                        {{__('jobs/new.title')}}
                    </label>

                    <input class="bg-gray-100 focus:bg-transparent mt-4" type="text" id="title" name="title">
                </section>

                <section class="flex flex-col md:flex-row justify-around items-center my-3">
                   <div class="w-full md:w-5/12 flex flex-col">
                       <label for="category" class="md:text-xl">
                           {{__('jobs/new.title')}}
                       </label>
                       <select name="category" id="category" class="mt-2">
                           @foreach($categories as $category)
                               <option value="{{__('home-page.job_types')[$category->name]}}">
                                   {{__('home-page.job_types')[$category->name]}}
                               </option>
                           @endforeach
                       </select>
                   </div>

                    <div class="w-full md:w-5/12 flex flex-col justify-center items-center">
                        <h1 class="md:text-xl">Job Type</h1>

                       <main class="flex w-full justify-center mt-2">
                           <div class="flex w-2/12">
                               <input type="radio" id="full_time" name="type" value="Full-time">
                               <label for="full_time" class="w-full">
                                   full time
                               </label>
                           </div>

                           <div class="flex w-3/12 justify-around">

                               <input type="radio" name="type" id="part_time" value="part-time">
                               <label for="part_time" class="w-full">
                                   Part time
                               </label>
                           </div>
                           <div class="flex w-2/12">

                               <input type="radio" id="contract" name="type" value="contract">

                               <label for="contract" class="w-full">
                                   contract
                               </label>
                           </div>
                       </main>
                    </div>
                </section>

                <section class="w-full flex flex-col md:flex-row my-3 justify-around">
                    <div class="w-5/12">
                        <label for="company_location">
                            {{__('jobs/new.company_location')}}
                        </label>

                        <input type="text" id="company_location" name="company-location">
                    </div>

                    <div class="w-5/12">
                        <label for="location">
                            {{__('jobs/new.location')}}
                        </label>

                       @include('partials.locations-select-input')
                    </div>
                </section>
            </form>
        </main>
    </div>
@endsection
