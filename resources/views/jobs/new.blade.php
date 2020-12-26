@extends('layouts.app')

@section('title')
    {{__('page-title.jobs.new')}}
@endsection

@section('description')
    {{__('page-description.jobs.new')}}
@endsection

@section('content')
    <div class="w-full flex flex-col items-center justify-center">


        <main class="w-full flex justify-center my-3">
            @if(session('notice'))
                <h1>{{session('notice')}}</h1>
            @endif


            <form
                class="w-full md:w-4/5 lg:w-2/3 text-accent text-sm md:text-base bg-white rounded-md p-1 md:p-10 shadow-lg"
                action="{{route('jobs.store', ['locale' => app()->getLocale()])}}" method="POST">
                <input type="hidden" value="{{$prevUrl}}" name="prevUrl">
                @csrf
                <header class="my-2">
                    <h1 class="text-xl md:text-2xl text-primary">
                        {{__('jobs/new.post-job')}}
                    </h1>
                </header>
                <section class="w-full">
                    <label for="title" class="md:text-xl">
                        {{__('jobs/new.title')}}
                    </label>

                    <input class="bg-gray-100 focus:bg-transparent mt-4" type="text" id="title" name="title">

                    @error('title')
                        <small class="text-red-500">
                            {{$message}}
                        </small>
                    @enderror
                </section>

                <section class="flex flex-col md:flex-row justify-around items-center mt-3 my-5">
                    <div class="w-full md:w-5/12 flex flex-col">
                        <label for="category" class="md:text-xl">
                            {{__('jobs/new.job_type')}}
                        </label>
                        <select  name="category" id="category" class="mt-2 w-full">
                            <option disabled selected value class="text-gray-500"> {{__('jobs/new.job_type')}} </option>
                            @foreach($categories as $category)
                                <option value="{{$category->name}}">
                                    {{__('home-page.job_types')[$category->name]}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full md:w-5/12 flex flex-col">
                        <label for="deadline" class="md:text-xl">
                            {{__('jobs/new.deadline')}}
                        </label>
                        <input class="bg-gray-100 focus:bg-transparent" type="date" id="deadline" name="deadline" min="{{now()->toDateString('y-m-d')}}">

                        @error('deadline')
                        <small class="text-red-500">
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                </section>

                <section class="w-full flex flex-col md:flex-row mt-5 mb-8 justify-around items-center">

                    <div class="w-full md:w-5/12">
                        <label class="md:text-xl" for="location">
                            {{__('jobs/new.location')}}
                        </label>

                        @include('partials.locations-select-input')

                        @error('location')
                        <small class="text-red-500">
                            {{$message}}
                        </small>
                        @enderror
                    </div>

                    <div class="w-full md:w-5/12">
                        <label class="md:text-xl" for="company_location">
                            {{__('jobs/new.company_location')}}
                        </label>

                        <input
                            class="bg-gray-100 focus:bg-transparent"
                            type="text" id="company_location"
                               name="company-location"
                               value="{{__('auth.locations')[auth()->user()->location]}}">
                    </div>
                </section>


                <section class="trix-container overflow-hidden mt-3">
                    <label class="md:text-xl">
                        {{__('jobs/new.description')}}
                    </label>



                   <div class="mt-4">
                       @trix(\App\Models\Job::class, 'content')
                   </div>

                    @error('job-trixFields.content')
                    <small class="text-red-500">
                        {{$message}}
                    </small>
                    @enderror
                </section>
                <button class="mt-3 accent-button px-3 py-2 text-white rounded">
                    {{__('jobs/new.submit')}}
                </button>

                <hr class="my-5 bg-gray-100" />

            </form>
        </main>
        @include('partials.language-change-links')
    </div>
@endsection
