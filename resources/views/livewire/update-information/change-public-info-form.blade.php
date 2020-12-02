<form wire:submit.prevent="updatePublicInformation" class="w-full flex flex-col items-center">
    @if (session()->has('success'))
        <h1 class="text-xl text-primary">
            {{ session('success') }}
        </h1>
    @endif


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

        <small class="text-xs mb-1 text-gray-600 mx-2">
            07xx xxx xxxx
        </small>

        @error('mobileNumber')
        <span class="text-red-400">{{$message}}</span>
        @enderror
    </div>

    <div class="flex w-4/5 md:w-2/5 flex-col">
        <label for="location">
            {{__('auth.location')}}
        </label>

        <select name="location" id="location"
                class="@error('location') border-red-500 @enderror">
            <option disabled selected value class="text-gray-500"> {{__('auth.select_location')}} </option>
            @foreach(array_keys(__('auth.locations')) as $l)
                <option @if($l == $user->location)
                        selected
                        @endif
                        value="{{$l}}"
                >
                    {{__('auth.locations')[$l]}}
                </option>
            @endforeach
        </select>
    </div>

    <button class="accent-button px-3 py-2 text-white rounded-md my-2" type="submit">
        {{__('users/default-user.update_information')}}
    </button>
</form>
