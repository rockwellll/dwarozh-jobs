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

    <livewire:update-information.change-password-form />

    <hr class="w-full bg-gray-400 my-2"/>
    <header class="w-full flex items-start">
        <h1 class="text-red-500 text-xl">
            {{__('users/default-user.danger_zone')}}
        </h1>
    </header>

    Deleting your account will erase everything related to you including
    <ul>
        <li>
            Your applications
        </li>

        <li>
            Your data
        </li>

        <li>
            anythign else related to you
        </li>

        <li>
            <b>Note: this action cannot be reversed</b>
        </li>
    </ul>
    <button class="bg-red-700 p-2 rounded text-white shadow">
        Delete Account
    </button>
</div>
