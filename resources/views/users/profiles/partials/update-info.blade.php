<div class="w-full flex flex-col items-center justify-center">
    <livewire:update-information.change-public-info-form :user="$user"/>


    <hr class="w-full bg-primary my-2"/>
    <header class="w-full flex items-start">
        <h1 class="text-accent text-xl">
            Resume
        </h1>
    </header>
    <livewire:update-information.change-resume-form :user="auth()->user()"/>




    <hr class="w-full bg-primary my-2"/>
    <header class="w-full flex items-start">
        <h1 class="text-accent text-xl">
            {{__('users/default-user.security_and_passwords')}}
        </h1>
    </header>

    <livewire:update-information.change-password-form :user="auth()->user()"/>

    <hr class="w-full bg-gray-400 my-2"/>
    <header class="w-full flex items-start">
        <h1 class="text-red-500 text-xl">
            {{__('users/default-user.danger_zone')}}
        </h1>
    </header>

    <div x-data="{ show: false }" class="w-full h-full">
        <div class="flex justify-center">
            <button @click={show=true} type="button" class="bg-red-700 p-2 rounded text-white shadow focus:outline-none focus:shadow-outline">
                {{__('users/default-user.delete_account_label')}}
            </button>
        </div>
        <div x-show="show" tabindex="0" class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed flex items-center justify-center">
            <div  @click.away="show = false" class="z-50 relative p-3 mx-auto my-0 max-w-full" style="width: 600px;">
                <div class="bg-white rounded shadow-lg border flex flex-col overflow-hidden">
                    <header class="mt-3">
                        <button @click={show=false} class="fill-current absolute @if(app()->getLocale() == "en")right-0  @else left-0 @endif top-0 m-6 font-3xl font-bold">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <div class="px-6 text-xl">
                            <h1 class="text-2xl text-red-600">
                                {{__('users/default-user.warning')}}
                            </h1>
                            <h2 class="text-xl">
                                {{__('users/default-user.delete_account')}}
                            </h2>
                        </div>
                    </header>
                    <main class="p-3 md:p-10 flex-grow">
                        <ul class="list-disc">
                            <li>
                                {{__('users/default-user.applications')}}
                            </li>

                            <li>
                               {{__('users/default-user.your_data')}}
                            </li>

                            <li>
                               {{__('users/default-user.anything_else_related_to_you')}}
                            </li>

                            <li>
                                <b>
                                    {{__('users/default-user.delete_account_note')}}
                                </b>
                            </li>
                        </ul>
                    </main>
                    <footer class="px-6 py-3">
                        <div class="flex justify-end">
                            <button @click={show=false} type="button" class="accent-button text-white rounded-md rounded px-4 py-2 mr-1">
                                {{__('users/default-user.cancel')}}
                            </button>
                            <form method="POST" action="{{route('users.delete-default-user', ['locale' => app()->getLocale()])}} ">
                                @method("delete")
                                @csrf
                                <input type="hidden" value="{{$user->id}}" name="id">
                                <button type="submit" class="bg-red-600 focus:outline-none focus:shadow-outline text-white rounded px-4 py-2 mx-2 rounded-md">
                                    {{__('users/default-user.i_understand_delete_account')}}
                                </button>
                            </form>
                        </div>
                    </footer>
                </div>
            </div>
            <div class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-black opacity-50"></div>
        </div>
    </div>
</div>
