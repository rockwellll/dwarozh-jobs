@extends('layouts.app')


@section('content')
    <h1>Edit your information</h1>


    <div class="w-full flex justify-center">
        <div class="w-full md:w-8/12 flex flex-col items-center justify-center bg-white rounded shadow p-2">
            <livewire:update-information.change-public-info-form :user="$user"/>


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

            <x-modal>
                <x-slot name="trigger">
                    <button @click={show=true} type="button" class="bg-red-600 hover:bg-red-700 p-2 rounded text-white shadow focus:outline-none focus:shadow-outline">
                        {{__('users/default-user.delete_account_label')}}
                    </button>
                </x-slot>

                <x-slot name="header">
                    <div slot="header" class="px-6 text-xl">
                        <h1 class="text-2xl text-red-600">
                            {{__('users/default-user.warning')}}
                        </h1>
                        <h2 class="text-xl">
                            {{__('users/default-user.delete_account')}}
                        </h2>
                    </div>
                </x-slot>

                <x-slot name="content">
                    <ul class="list-disc p-5">
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
                </x-slot>

                <x-slot name="footer">
                    <div slot="footer" class="flex justify-end">
                        <button @click={show=false} type="button" class="accent-button text-white rounded-md rounded px-4 py-2 mr-1">
                            {{__('users/default-user.cancel')}}
                        </button>


                        <form method="POST" action="{{route('users.business.destroy', ['locale' => app()->getLocale()])}} ">
                            @method("delete")
                            @csrf
                            <input type="hidden" value="{{$user->id}}" name="id">
                            <button type="submit" class="bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline text-white rounded px-4 py-2 mx-2 rounded-md">
                                {{__('users/default-user.i_understand_delete_account')}}
                            </button>
                        </form>
                    </div>
                </x-slot>
            </x-modal>
        </div>

    </div>
@endsection
