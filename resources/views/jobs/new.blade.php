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
            <form
                class="w-full md:w-4/5 lg:w-2/3 text-accent text-sm md:text-base bg-white rounded-md p-1 md:p-10 shadow-lg"
                action="{{route('jobs.store', ['locale' => app()->getLocale()])}}" method="POST">
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
                </section>

                <section class="flex justify-start items-center my-3">
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
                </section>

                <section class="w-full flex flex-col md:flex-row my-5 justify-between items-center">
                    <div class="w-5/12">
                        <label for="company_location">
                            {{__('jobs/new.company_location')}}
                        </label>

                        <input type="text" id="company_location"
                               name="company-location"
                               value="{{auth()->user()->location}}">
                    </div>

                    <div class="w-5/12">
                        <label for="location">
                            {{__('jobs/new.location')}}
                        </label>

                        @include('partials.locations-select-input')
                    </div>
                </section>

                <section class="trix-container overflow-hidden">
                    @trix(\App\Models\Job::class, 'description')
                </section>

                <hr class="my-5 bg-gray-100" />
            </form>
        </main>
        @include('partials.language-change-links')
    </div>
@endsection
