<header>
    <h1 class="text-accent">
        Here you can view the jobs you favorited before
    </h1>
    <footer class="flex flex-row items-center">
        <small class="text-primary">TIP: you can favorite jobs by clicking
        </small>
        <svg class="w-3 h-3 text-primary mx-1" fill="currentColor" viewBox="0 0 20 20"
             xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                  d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                  clip-rule="evenodd"></path>
        </svg>


    </footer>
</header>

<hr class="h-2 w-full my-2"/>

<div class="w-full flex flex-col md:flex-row justify-around items-start">
    @foreach($user->userable->favorites(\App\Models\Job::class)->get() as $job)
        <livewire:favorite-job :job="$job"/>
    @endforeach
</div>
