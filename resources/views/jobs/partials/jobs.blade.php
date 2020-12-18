<section class="w-full flex relative" x-data="{show: false}">
    <aside
        x-show.transition="show"
        class="bg-white sm:bg-transparent absolute md:relative text-gray-700 text-md w-full  sm:w-auto md:w-3/12 lg:w-2/12 xl:w-2/12  rounded-md md:mx-4">
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

        <ul>
            @foreach($jobs as $job)
                <li onclick="document.getElementById('link-{{$job->id}}').click()"
                    class="my-1 cursor-pointer w-full @if($viewedJob->id == $job->id) border border-primary @endif my-1 w-full bg-white p-3 rounded-md @if(!$loop->first) my-3 @endif">
                    <a class="truncate hidden"
                       id="link-{{$job->id}}"
                       href="{{route('jobs.index', ['locale' => app()->getLocale(), 'j' => $job->id, 'category' => request()->query("category")])}}">
                        {{$job->title}}
                    </a>


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

                    <main class="flex w-full items-center justify-between">
                        <div class="flex items-center justify-between">
                            <b>
                                {{__('jobs/index.job_title')}}
                            </b>
                            <span class="truncate">
                                {{$job->title}}
                            </span>

                        </div>
                    </main>

                    <footer class="flex mb-2">
                        <b>
                            {{__('jobs/index.job_location')}}
                        </b>
                        <h6 class="mx-1">{{$job->location}}</h6>
                    </footer>
                </li>
            @endforeach
        </ul>
    </aside>


    <aside
        class="text-gray-700 text-md hidden md:flex w-auto sm:w-auto md:w-3/12 lg:w-3/12">
        <ul>
            @foreach($jobs as $job)
                <li onclick="document.getElementById('link-{{$job->id}}').click()"
                    class="my-1 cursor-pointer w-full border border-transparent @if($viewedJob->id == $job->id) border border-primary @endif my-1 w-full bg-white p-2 rounded-md @if(!$loop->first) my-3 @endif">
                    <a class="truncate hidden"
                       id="link-{{$job->id}}"
                       href="{{route('jobs.index', ['locale' => app()->getLocale(), 'j' => $job->id, 'category' => request()->query("category")])}}">
                        {{$job->title}}
                    </a>


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

                    <main class="flex w-full items-center justify-between">
                        <div class="flex items-center justify-between">
                            <b>
                                {{__('jobs/index.job_title')}}
                            </b>
                            <span class="truncate">
                                {{$job->title}}
                            </span>

                        </div>
                    </main>

                    <footer class="flex mb-2">
                        <b>
                            {{__('jobs/index.job_location')}}
                        </b>
                        <h6 class="mx-1">{{$job->location}}</h6>
                    </footer>
                </li>
            @endforeach
        </ul>
    </aside>

    <section class="w-full md:w-9/12 lg:w-7/12 xl:w-8/12">
        <div class="md:hidden">
            <button
                class="text-primary underline transition duration-300 hover:text-green-700 px-2 py-1 focus:outline-none"
                @click="show = true"
            >
                View Other Jobs
            </button>
        </div>
        <div class="text-gray-700  bg-white w-full  rounded p-4 overflow-y-auto"
             style="min-height: 200px; max-height: 800px">
            <div class="flex  justify-between">
                <div class="text-4xl text-gray-700 font-bold font font-serif text-center ">
                    {{ $viewedJob->title}}
                </div>

                @auth
                    @can('favorite-jobs')
                        <aside class="flex text-base items-center justify-center text-black">
                            <livewire:apply-to-job :viewedJob="$viewedJob" :user="auth()->user()->userable"/>

                            <button class="mx-2 text-primary font-weight-bold">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                                </svg>
                            </button>


                            <livewire:favorite-button :key="$viewedJob->id" :job="$viewedJob"/>

                        </aside>
                    @endcan
                @endauth


            </div>

            <h1 class="text-xl">
                {{__('jobs/index.company_name')}}
                {{$viewedJob->owner->name}}
            </h1>
            <div class="text-md">
                {{__('jobs/index.job_location')}}
                {{__('auth.locations')[$jobs[0]->location]}}
            </div>

            <main class="job-content p-4">
                {!! $viewedJob->content !!}
            </main>
        </div>
    </section>
</section>
