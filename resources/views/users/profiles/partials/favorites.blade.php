<header>
    <h1 class="text-accent">
        {{__('users/default-user.favorite_info')}}
    </h1>
    <footer class="flex flex-row items-center">
        <small class="text-primary">
            {{__('users/default-user.favorite_tip')}}
        </small>
        <svg class="w-3 h-3 text-primary md:mx-1" fill="currentColor" viewBox="0 0 20 20"
             xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                  d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                  clip-rule="evenodd"></path>
        </svg>
    </footer>
</header>

<hr class="h-2 w-full my-2"/>

@if(!$user->userable->hasFavoritedJobs())
    <section class="w-full flex flex-col justify-center items-center">
        <header>
            <svg class="w-20 h-20 text-primary" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z"
                      clip-rule="evenodd"></path>
            </svg>
        </header>

        <main class="text-center">
            <p>{{__('users/default-user.no_favorite_yet')}}</p>
            <p>{{__('users/default-user.when_you_favorite')}}</p>
            <footer class="flex flex-row items-center justify-center text-center">
                <p class="text-primary">{{__('users/default-user.favorite_tip')}}
                </p>
                <svg class="w-4 h-5 text-primary mx-1" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                          clip-rule="evenodd"></path>
                </svg>


            </footer>
        </main>

    </section>
@else
    <div class="w-full flex flex-col md:flex-row justify-start items-start">
        @foreach($user->userable->favorites(\App\Models\Job::class)->get() as $job)
            <x-job :job="$job">
                <x-slot name="actions">
                    <div class="flex flex-col md:flex-row items-center mt-2">
                        <form method="POST" action="{{route("favorites.destroy", ['job' => $job->id])}}">
                            @method("delete")
                            @csrf

                            <button class="accent-button text-white rounded px-3 py-2">
                                Remove
                            </button>
                        </form>

                        <form method="GET"
                              action="{{route('jobs.index', ['locale' => app()->getLocale()])}}">
                            <input type="hidden" value="{{$job->id}}" name="j">
                            <input type="hidden" value="{{$job->type->name}}" name="category">

                            <button class="primary-button text-white rounded px-3 py-2 mx-2">
                                View
                            </button>
                        </form>
                    </div>
                </x-slot>
            </x-job>

        @endforeach
    </div>

@endif

