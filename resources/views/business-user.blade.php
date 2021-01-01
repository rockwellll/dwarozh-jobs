@extends('layouts.app')

@section('title')
    {{__('page-title.jobs.index')}}
@endsection

@section('description')
    {{__('page-description.jobs.index')}}
@endsection

@section("content")
    <section class="w-full" x-data="{show: false}">
    @if (session()->has('success'))
        <h1 class="text-xl text-primary">
            {{ session('success') }}
        </h1>
    @endif


    <div class=" text-gray-700 font-bold text-3xl">Welcome back Business User </div>
    <div class="flex p-1  mx-5">

        <p class=" text-gray-700 text-sm md:text-xl ">Here Are the jobs you posted. </p>

           <a href="{{route('jobs.create', ['locale' => app()->getLocale()])}}"
               class="mx-2 text-center text-xs md:text-sm px-3 py-2 primary-button focus:outline-none focus:shadow-outline">
              Create Opportunity
           </a>


        <a href="{{route('users.business.edit', ['locale' => app()->getLocale()])}}"
           class="mx-2 text-center text-xs md:text-sm px-3 py-2 bg-yellow-800 hover:bg-yellow-900 rounded-md text-white focus:outline-none focus:shadow-outline">
            Edit Account
        </a>
    </div>


{{--        <div class="flex flex-col md:flex-row justify-between mx-5">--}}
{{--            <p class=" text-gray-700 text-xl ">Here Are the jobs you posted. </p>--}}

{{--            <div class="flex md:flex-row mt-2 w-full">--}}
{{--                <a href="{{route('jobs.create', ['locale' => app()->getLocale()])}}"--}}
{{--                   class="mx-2 text-sm px-3 py-2 primary-button focus:outline-none focus:shadow-outline">--}}
{{--                    Create Opportunity--}}
{{--                </a>--}}


{{--                <a href="{{route('users.business.edit', ['locale' => app()->getLocale()])}}"--}}
{{--                   class="mx-2 text-sm px-3 py-2 bg-yellow-800 hover:bg-yellow-900 rounded-md text-white focus:outline-none focus:shadow-outline">--}}
{{--                    Edit Account--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
    <div class="flex flex-col justify-center items-center">


        <div
            class="flex flex-col justify-start md:flex-row sm:flex-col lg:flex-row xl:flex-row md:justify-center lg:p-5 mt-5 w-full rounded-md">
            <aside
                class="text-gray-700  text-md  w-auto sm:w-auto md:w-3/12 lg:w-3/12 xl:w-3/12  mx-4 hidden md:flex">
                <ul class="">
                    @foreach($jobs as $job)
                        @include('jobs._job', ['job' => $job])
                    @endforeach
                </ul>
            </aside>
            <button  @click={show=!show} class="text-primary underline md:hidden">View All Jobs</button>
            <aside
                x-show.transition="show"
                class="text-gray-700 text-md bg-white px-2 sm:justify-center py-5 absolute mx-3 md:hidden  flex flex-col justify-start">
                <header class="flex justify-end p-2 w-full md:hidden">
                    <button @click={show=!show}
                            class="focus:outline-none transition duration-300 hover:text-gray-500 focus:text-black fill-current font-3xl font-bold">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </header>

                <ul class="">
                    @foreach($jobs as $job)
                        @include('jobs._job', ['job' => $job])
                    @endforeach
                </ul>
            </aside>

            @if(is_null($viewedJob))
                you have no jobs posted yet

            @else
                <div class="text-gray-700  bg-white w-full sm:w-full md:w-9/12 lg:w-7/12 xl:w-8/12 rounded p-4 ">
                    <header class="flex   justify-between">
                        <div class=" text-gray-700 font-bold font font-serif  ">
                            <h1 class=" text-center text-xl md:text-2xl  ">
                                {{__('jobs/index.job_title')}} {{$viewedJob->title}}
                            </h1>
                        </div>

                        <aside class="flex text-base">
                            <form action="">
                                <button class="mx-2 px-3 py-2  text-xs md:text-sm rounded-md primary-button  focus:outline-none focus:shadow-outline p-1">
                                   Edit
                                </button>
                            </form>
                           @if($viewedJob->closed)
                                <h1>this job is closed</h1>

                            @else
                                <form method="POST" action="{{route('close', ['job' => $job->id])}}">
                                    @method('put')
                                    @csrf
                                    <button
                                        class="mx-2 px-3 py-2  text-xs md:text-sm text-white rounded-md  bg-yellow-700 focus:outline-none focus:shadow-outline p-1">
                                        Close
                                    </button>
                                </form>

                            @endif
                            <form method="POST" action="{{route('jobs.destroy', ['job' => $job->id])}}">
                                @method('delete')
                                @csrf
                                <button
                                    class="mx-2 px-3 py-2   text-xs md:text-sm text-white rounded-md   bg-pink-800 focus:outline-none focus:shadow-outline p-1">
                                    Delete
                                </button>
                            </form>

                        </aside>

                    </header>

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

                    <footer class="flex flex-col md:flex-row justify-start">
                        @foreach($viewedJob->applicants as $applicant)
                            <div class=" border text-black border-black rounded m-2 p-2 ">
                                <header class=" flex justify-between ">
                                    <h3>Name: {{$applicant->name}}</h3>
                                    {{--                                    <a href="{{route('users.default-user-profile', ['locale' => app()->getLocale()])}}">--}}
                                    {{--                                        Original Profile--}}
                                    {{--                                    </a>--}}

                                    {{--                                    <small class="text-sm text-primary-700"> </small>--}}
                                </header>

                                <main class="flex">
                                <span>
                                    {{__('jobs/index.cv')}}:
                                    @if(!is_null($applicant->user->attachment))
                                         <a href="{{ Storage::url($applicant->user->attachment->url) }}">
                                            {{$applicant->user->attachment->name}}
                                        </a>
                                    @endif
                                </span>
                                </main>
                                <span class=" flex justify-between ">
                            <span class="text-md mr-3"> Attachments</span>
                            <span class="text-sm text-primary-700"> Amanj-cv.pdf</span>
                     </span>
                            </div>
                        @endforeach
                    </footer>
                </div>
            @endif
        </div>
    </div>
    </section>
@endsection
