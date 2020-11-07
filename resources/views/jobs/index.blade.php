@extends('layouts.app')

@section('title')
    {{__('page-title.jobs.index')}}
@endsection

@section('description')
    {{__('page-description.jobs.index')}}
@endsection

@section("content")

    <div class="flex flex-col justify-center items-center">
        <div class="w-full md:w-11/12 xl:w-8/12 flex-col justify-center items-center">
            @include('partials.job-search')
        </div>


        <div
            class="flex flex-col md:flex-row sm:flex-col lg:flex-row xl:flex-row justify-center lg:p-5 mt-5 w-full rounded-md">
            <aside
                class="text-gray-700 bg-white text-md  w-auto sm:w-auto md:w-3/12 lg:w-2/12 xl:w-2/12 border border-primary">
                <ul class="divide-y divide-teal-600 p-4">
                    @foreach($jobs as $job)
                        <li class="my-1 w-full">
                            <header>
                                <h1>
                                    <b>
                                        {{__('jobs/index.company_name')}}
                                    </b>
                                    <span class="mx-1">
                                    {{$job->owner->name}}
                                    </span>
                                </h1>
                            </header>

                            <main>
                                <b>
                                    {{__('jobs/index.job_title')}}
                                </b>
                                <a class="mx-1" href="#">
                                    {{$job->title}}
                                </a>
                            </main>

                            <footer class="flex">
                                <b>
                                    {{__('jobs/index.job_location')}}
                                </b>
                                <h6 class="mx-1">{{$job->location}}</h6>
                            </footer>
                        </li>
                    @endforeach
                </ul>
            </aside>

            <div class="  text-gray-700  bg-white w-full sm:w-full md:w-9/12 lg:w-7/12 xl:w-8/12 rounded p-4 ">
                <div class="flex   justify-between">
                    <div class="text-4xl text-gray-700 font-bold font font-serif text-center ">Job Title</div>

                    <div class="flex text-base">
                        <button class="mx-2 px-3 py-2 primary-button focus:outline-none focus:shadow-outline">Easy
                            Apply
                        </button>
                        <button class="mx-2 pt-2 text-primary font-weight-bold ">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                            </svg>
                        </button>

                    </div>

                </div>

                <div class="text-xl">Company Name</div>
                <div class="text-md">location</div>
                <div class="mt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                    has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                    galley of type and scrambled it to make a type specimen book. It has survived not only five
                    centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was
                    popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and
                    more recently with desktop publishing software like Aldus PageMaker including versions of Lorem
                    Ipsum.
                </div>
                <ul class="mt-2 list-disc list-inside">
                    <li class="mt-1">requirement</li>
                    <li class="mt-1">requirement</li>
                    <li class="mt-1">requirement</li>
                </ul>

                <div class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                    has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                    galley of type and scrambled it to make a type specimen book. It has survived not only five
                    centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was
                    popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and
                    more recently with desktop publishing software like Aldus PageMaker including versions of Lorem
                    Ipsum.
                </div>
                <div class="mt-3"> Contact Information</div>
                <ul class="mt-2 list-disc list-inside">
                    <li class="mt-1">Email</li>
                    <li class="mt-1">Mobile</li>
                    <li class="mt-1">Website</li>
                </ul>
            </div>
        </div>
    </div>



@endsection
