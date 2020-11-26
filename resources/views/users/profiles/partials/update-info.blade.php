<div class="w-full flex flex-col items-center justify-center">
    <header class="w-full flex items-start">
        <h1 class="text-accent text-xl">
            {{__('users/default-user.public_information')}}
        </h1>
    </header>
    <div class="flex w-4/5 md:w-2/5 flex-col">
        <label class="mx-1" for="firstName">
            {{__('auth.first_name')}}
        </label>
        <input
            required
            type="text"
            id="firstName"
            value="{{$user->name}}"
            name="firstName"
            placeholder="{{__("auth.first_name")}}"
            class="bg-body @error('firstName') border-red-500 @enderror">

        @error('firstName')
        <span class="text-red-400">{{$message}}</span>
        @enderror
    </div>
    <div class="flex w-4/5 md:w-2/5 flex-col">
        <label class="mx-1" for="firstName">
            {{__('auth.email')}}
        </label>
        <input
            required
            type="text"
            id="firstName"
            value="{{$user->email}}"
            name="firstName"
            placeholder="{{__("auth.email")}}"
            class="bg-body @error('firstName') border-red-500 @enderror">

        @error('firstName')
        <span class="text-red-400">{{$message}}</span>
        @enderror
    </div>
    <div class="flex w-4/5 md:w-2/5 flex-col">
        <label class="mx-1" for="mobileNumber">
            {{__('auth.mobile_number')}}
        </label>
        <input
            required
            type="text"
            id="firstName"
            value="{{$user->mobileNumber}}"
            name="mobileNumber"
            placeholder="{{__("auth.mobile_number")}}"
            class="bg-body @error('mobileNumber') border-red-500 @enderror">

        @error('mobileNumber')
        <span class="text-red-400">{{$message}}</span>
        @enderror
    </div>

    <div class="flex w-4/5 md:w-2/5 flex-col">
        @include('partials.locations-select-input')
    </div>


    <div class="flex w-4/5 md:w-2/5 flex-col">
        @empty($user->attachment)
            <h1>You havent got any resume</h1>

        @else
            <h1>{{__('users/default-user.view')}}
                <a class="link" href="{{ Storage::url($user->attachment->url)  }}">
                    {{__('users/default-user.view_resume')}}
                </a>
            </h1>
        @endempty

        <span class="">
                                {{__('auth.resume')}}
                            </span>

        <div
            class="flex items-center bg-body rounded-md border-2 border-gray-400 @error('attachment') border-red-500 @enderror">
            <label for="file" class="file-label p-2 bg-body">
                {{ __('auth.choose_resume')}}
            </label>
            <span id="chosenFile" class="text-gray-500">
                                    @empty($user->attachment)
                    {{__('auth.no_file_selected')}}
                @else
                    {{$user->attachment->name}}
                @endempty
                                 </span>
        </div>
        <input type="file" name="attachment" id="file" style="display: none;"
               accept=".docx,application/msword, .pdf, application/pdf">
        @error('attachment')
        <span class="text-red-400">{{$message}}</span>
        @enderror


    </div>


    <button class="accent-button px-3 py-2 text-white rounded-md my-2" type="submit">
        {{__('users/default-user.update_information')}}
    </button>

    <hr class="w-full bg-primary my-2"/>
    <header class="w-full flex items-start">
        <h1 class="text-accent text-xl">
            {{__('users/default-user.security_and_passwords')}}
        </h1>
    </header>


    <livewire:password-change-form/>

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
