<main class="w-full bg-white rounded-md md:w-8/12 p-3 flex flex-col items-center shadow">
    <h1 class="text-3xl">
        {{__('jobs/index.no_jobs_posted_yet')}}
    </h1>

    @can('publish-jobs')
        <header class="w-full md:w-6/12 mt-2">
            <h1 class="text-xl">
                {{__("page-description.bussiness_register")}}
            </h1>
        </header>

        <footer class="mt-2">
            <a class="link padded-underline mx-0 mt-2 sm:mx-0 md:mx-2: md:mt-0  lg:mx-2"
               href="{{ route('jobs.create', ['locale' => app()->getLocale()]) }}">
                {{__('home-page.Publish a job')}}
            </a>
        </footer>
    @else
        <h2 class="text-xl">
            {{__("jobs/index.check_back_later")}}
            <br/>{{__("jobs/index.good_luck")}}
        </h2>

        @auth
            <hr class="w-full bg-primary my-2"/>
            <h1 class="self-start text-xl">
                {{__("jobs/index.here_is_what_to_do")}}
            </h1>
            <main class="w-full px-4 mt-2">


                <ul class="list-disc mt-2">
                    <li>
                        {{__("jobs/index.check_yo_info")}}

                        <a class="link"
                           href="{{route("users.default-user-profile", ["locale" => app()->getLocale()])}}">
                            {{__('jobs/index.profile')}}
                        </a>
                    </li>

                    <li>
                        {{__('jobs/index.make_sure')}}

                        <a class="link"
                           href="{{route('users.default-user-profile', ["locale" => app()->getLocale()])}}?tab=update#resume">
                            {{__('jobs/index.cv')}}
                        </a>
                    </li>
                </ul>
            </main>
        @endauth
    @endcan
</main>
