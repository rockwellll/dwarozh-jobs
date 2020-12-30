<li class="bg-white @if($viewedJob->id == $job->id) border border-primary @endif p-1 cursor-pointer rounded mb-2" onclick="document.getElementById('link-{{$job->id}}').click()">
    <a class="truncate hidden"
       id="link-{{$job->id}}"
       href="?j={{$job->id}}">
    </a>


    <article class="p-3 ">
        <header class=" flex justify-between ">
            <h2 class="text-xl">
                Name: {{ $job->title }}
            </h2>
            <span class="text-md">
                                        Created at {{$job->created_at->toDateString("DD/MM/YYYY")}}
                                    </span>
        </header>

        <section class=" flex justify-between ">
                                    <span
                                        class="text-xl"> number of applications: {{$job->applicants()->count()}}</span>
            <span class="text-md text-primary-700"> view more</span>
        </section>

    </article>
</li>
