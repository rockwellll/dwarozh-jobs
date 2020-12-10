<header>
    <h1 class="text-accent">
      {{__('users/default-user.here_you_see_jobs_applied')}}
    </h1>
</header>

<hr class="h-2 w-full my-2"/>


@if($user->userable->applications()->count() == 0)
    <section class="w-full flex flex-col justify-center items-center h-full">
        <main class="text-center">
            <p>{{__('users/default-user.havent_applied_yet')}}</p>
            <p>{{__('users/default-user.when_you_save')}}</p>
        </main>

    </section>
@else
    <section class="w-full grid  grid-cols-1 md:grid-cols-2">
        @foreach($user->userable->applications as $application)
            <x-job :job="$application">
                <x-slot name="actions">
                    <div class="flex flex-col md:flex-row items-center mt-2 justify-start">
                        <x-modal>
                            <x-slot name="trigger">
                                <button @click={show=true} type="button" class="accent-button p-2 rounded text-white shadow focus:outline-none focus:shadow-outline">
                                    {{__('users/default-user.withdraw')}}
                                </button>
                            </x-slot>

                            <x-slot name="header">
                                <div slot="header" class="text-xl">
                                    <h1 class="text-2xl text-red-600">
                                        {{__('users/default-user.warning')}}
                                    </h1>
                                    <h2 class="text-xl">
                                        {{__('users/default-user.withdraw_warning')}}, <b>
                                            {{__('users/default-user.are_you_sure')}}
                                        </b>
                                    </h2>
                                </div>
                            </x-slot>

                            <x-slot name="content">
                                <p>{{__('users/default-user.you_can_apply_later_again')}}</p>
                            </x-slot>

                            <x-slot name="footer">
                                <div slot="footer" class="flex justify-end">
                                    <button @click={show=false} type="button" class="accent-button text-white rounded-md rounded px-4 py-2 mr-1">
                                        {{__('users/default-user.cancel')}}
                                    </button>
                                    <form method="POST" action="{{route("remove-job-application", ["job" => $application])}} ">
                                        @method("delete")
                                        @csrf
                                        <input type="hidden" value="{{$user->id}}" name="id">
                                        <button type="submit" class="bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline text-white rounded px-4 py-2 mx-2 rounded-md">
                                            {{__('users/default-user.withdraw_confirm')}}
                                        </button>
                                    </form>
                                </div>
                            </x-slot>
                        </x-modal>


                        <form method="GET"
                              action="{{route('jobs.index', ['locale' => app()->getLocale()])}}">
                            <input type="hidden" value="{{$application->id}}" name="j">
                            <input type="hidden" value="{{$application->type->name}}" name="category">

                            <button class="primary-button text-white rounded px-3 py-2 mx-2">
                                {{__('users/default-user.view')}}
                            </button>
                        </form>
                    </div>
                </x-slot>
            </x-job>
        @endforeach
    </section>
@endif
