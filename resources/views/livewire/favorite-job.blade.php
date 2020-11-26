 <section class="{{$isRemoved ? 'none' : null}} rounded border p-5 w-full md:w-5/12 ">

        <header>
            {!! $isRemoved !!}
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

            <div class="flex flex-col md:flex-row items-center mt-2">
                <form wire:submit.prevent="removeFromFavorite()">
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
        </footer>
    </section>
