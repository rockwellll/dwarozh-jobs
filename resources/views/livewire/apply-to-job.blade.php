<section>
    @if($didApply)
        <small>
            {{__('jobs/index.already_applied')}}
        </small>
    @else
        <x-modal>
            <x-slot name="trigger">
                <button
                    @click="show=true"
                    class="mx-2 px-3 py-2 primary-button focus:outline-none focus:shadow-outline">
                    {{__('jobs/index.apply_to_job')}}
                </button>
            </x-slot>

            <x-slot name="header">
                <h1 class="text-2xl">
                    {{__('jobs/index.about_to_apply')}}
                </h1>
                <h2 class="text-xl">{{$viewedJob->title}}</h2>
            </x-slot>

            <x-slot name="content">
                <p>
                    {{__('jobs/index.company_can_download')}}
                    <br />

                    {{__('jobs/index.you_can_withdraw')}}
                </p>
            </x-slot>

            <x-slot name="footer">
                <button class="px-3 py-1 mx-2 text-accent focus:outline-none focus:shadow-outline hover:text-gray-500 focus:text-gray-500" @click="show=false">
                    {{__('users/default-user.cancel')}}
                </button>

                <form wire:submit.prevent="apply">
                    <button type="submit" class="primary-button rounded-md focus:outline-none focus:shadow-outline text-white px-3 py-2">
                        {{__('jobs/index.apply_to_job')}}
                    </button>
                </form>
            </x-slot>
        </x-modal>

    @endif
</section>
