<form wire:submit.prevent="updatePassword" class="w-full flex flex-col items-center">
    <header class="w-full flex items-start">
        <h1 class="text-accent text-xl">
            {{__('users/default-user.public_information')}}
        </h1>
    </header>
    <div class="flex w-4/5 md:w-2/5 flex-col">
        <label class="mx-1" for="name">
            {{__('auth.first_name')}}
        </label>
        <input
            wire:model.defer="name"
            required
            type="text"
            id="name"
            name="name"
            placeholder="{{__("auth.first_name")}}"
            class="bg-body @error('name') border-red-500 @enderror">

        @error('name')
        <span class="text-red-400">{{$message}}</span>
        @enderror
    </div>
    <div class="flex w-4/5 md:w-2/5 flex-col">
        <label class="mx-1" for="email">
            {{__('auth.email')}}
        </label>
        <input
            wire:model.defer="email"
            required
            type="email"
            id="email"
            name="email"
            placeholder="{{__("auth.email")}}"
            class="bg-body @error('email') border-red-500 @enderror">

        @error('email')
        <span class="text-red-400">{{$message}}</span>
        @enderror
    </div>
    <div class="flex w-4/5 md:w-2/5 flex-col">
        <label class="mx-1" for="mobileNumber">
            {{__('auth.mobile_number')}}
        </label>
        <input
            wire:model.defer="mobileNumber"
            required
            type="text"
            id="mobileNumber"
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
</form>
