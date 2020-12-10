<article class="rounded border p-5 mx-5 my-2">
    <header>
        <h1>
            {{__('jobs/index.job_title')}}:
            {{$job->title}}
        </h1>
    </header>

    <main>
        {{__('jobs/index.company_name')}}:
        {{$job->owner->name}}
    </main>

    <footer>
        Deadline {{$job->deadline}}

        {{$actions}}
    </footer>
</article>
