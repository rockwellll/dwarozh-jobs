@extends('layouts.app')

@section('title')
    {{__('page-title.jobs.index')}}
@endsection

@section('description')
    {{__('page-description.jobs.index')}}
@endsection

@section("content")
    <p class="text-left text-gray-700 font-bold text-3xl">Welcome back Business User </p>
    <div class="flex justify-between mx-5">
        <p class=" text-gray-700 text-xl ">Here Are the jobs you posted. </p>

        <a href="{{route('users.business.edit', ['locale' => app()->getLocale()])}}"
           class="mx-2 text-sm px-3 py-2 primary-button focus:outline-none focus:shadow-outline">
            Create Opportunity
        </a>
    </div>
    <div class="flex flex-col justify-center items-center">


        <div
            class="flex flex-col md:flex-row sm:flex-col lg:flex-row xl:flex-row justify-center lg:p-5 mt-5 w-full rounded-md">
            <aside
                class="text-gray-700  text-md  w-auto sm:w-auto md:w-3/12 lg:w-3/12 xl:w-3/12   mx-4">
                <ul class="">
                    @foreach($jobs as $job)
                        <li class="bg-white rounded mb-2">
                            <article class="p-3 ">
                                <header class=" flex justify-between ">
                                    <h2 class="text-xl">
                                     Name:   {{ $job->title }}
                                    </h2>
                                    <span class="text-md">
                                        Created at {{$job->created_at->toDateString("DD/MM/YYYY")}}
                                    </span>
                                </header>

                                <section class=" flex justify-between ">
                                    <span class="text-xl"> number of applications: {{$job->applicants()->count()}}</span>
                                    <span class="text-md text-primary-700"> view more</span>
                                </section>

                            </article>
                        </li>
                    @endforeach
                </ul>
            </aside>

            <div class="  text-gray-700  bg-white w-full sm:w-full md:w-9/12 lg:w-7/12 xl:w-8/12 rounded p-4 ">
                <div class="flex   justify-between">
                    <div class="text-4xl text-gray-700 font-bold font font-serif text-center ">
                        Job Title
                    </div>

                    <aside class="flex text-base">
                        <button class="mx-2 px-3 py-2 primary-button focus:outline-none focus:shadow-outline p-1">
                            Edit
                        </button>
                        <button
                            class="mx-2 px-3 py-2  text-white rounded-md mt-2 bg-yellow-800 focus:outline-none focus:shadow-outline p-1">
                            Close
                        </button>
                        <button
                            class="mx-2 px-3 py-2 text-white rounded-md mt-2  bg-pink-800 focus:outline-none focus:shadow-outline p-1">
                            Delete
                        </button>

                    </aside>

                </div>

                <h1 class="text-xl">
                    number of applications
                </h1>
                <div class="text-md">

                    created at
                    end at
                </div>

                <main class="job-content p-4">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum.
                </main>
                <div class="flex justify-start ">
                    <div class=" border text-black border-black rounded m-2 p-2 ">
                     <span class=" flex justify-between ">
                            <span class="text-md mr-3"> Name: Amanj Adnan</span>
                            <span class="text-sm text-primary-700"> Original Profile</span>
                     </span>
                        <span class=" flex justify-between ">
                            <span class="text-md mr-3"> Attachments</span>
                            <span class="text-sm text-primary-700"> Amanj-cv.pdf</span>
                     </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
