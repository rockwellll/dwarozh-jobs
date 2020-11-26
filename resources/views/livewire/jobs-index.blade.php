<div
    class="flex flex-col md:flex-row sm:flex-col lg:flex-row xl:flex-row justify-center lg:p-5 mt-5 w-full rounded-md">
    <aside
        class="text-gray-700 bg-white text-md  w-auto sm:w-auto md:w-3/12 lg:w-2/12 xl:w-2/12 border border-primary rounded-md mx-4">
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

                    <main class="flex w-full items-center justify-between">
                        <div class="flex items-center justify-between">
                            <b>
                                {{__('jobs/index.job_title')}}
                            </b>
                                <button wire:click="viewJob({{$job}})" class="truncate">
                                    {{$job->title}}
                                </button>
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

    <div class="  text-gray-700  bg-white w-full sm:w-full md:w-9/12 lg:w-7/12 xl:w-8/12 rounded p-4 ">
        @if(is_null($viewedJob))
            there is no hob posted yet

        @else
            <div class="flex   justify-between">
                <div class="text-4xl text-gray-700 font-bold font font-serif text-center ">
                    {{ $viewedJob->title}}
                </div>

                <aside class="flex text-base items-center">
                    <button class="mx-2 px-3 py-2 primary-button focus:outline-none focus:shadow-outline">
                        {{__('jobs/index.apply_to_job')}}
                    </button>
                    <button class="mx-2 pt-2 text-primary font-weight-bold ">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </svg>
                    </button>

                    @auth
                        @can('favorite-jobs')
                            <livewire:favorite-button :job="$viewedJob"/>
                        @endcan
                    @endauth
                </aside>

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
        @endif
    </div>
</div>