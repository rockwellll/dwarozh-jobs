<form wire:submit.prevent="updatePassword" class="w-full flex flex-col items-center">
    @if (session()->has('success'))
        <h1 class="text-xl text-primary">
            {{ session('success') }}
        </h1>
    @endif

    <div class="flex w-4/5 md:w-2/5 flex-col my-2">
        <label class="mx-1" for="old_password">
            {{__('users/default-user.current_password')}}
        </label>
        <input
            type="{{$showPassword ? "text": "password"}}"
            id="old_password"
            value=""
            wire:model.lazy="old"
            name="old"
            placeholder="{{__("auth.password")}}"
            class="bg-body @error('old') border-red-500 @enderror">

        @error('old')
        <span class="text-red-400">{{$message}}</span>
        @enderror

        @error('old_dont_match')
        <span class="text-red-400">{{$message}}</span>
        @enderror

    </div>
    <div class="flex w-4/5 md:w-2/5 flex-col">
        <label class="mx-1" for="password">
            {{__('users/default-user.new_password')}}
        </label>
        <input
            wire:model.lazy="password"
            type="{{$showPassword ? "text": "password"}}"
            id="password"
            value=""
            name="password"
            placeholder="{{__("auth.password")}}"
            class="bg-body @error('password') border-red-500 @enderror">

        @error('password')
        <span class="text-red-400">{{$message}}</span>
        @enderror
    </div>
    <div class="flex w-4/5 md:w-2/5 flex-col my-2">
        <label class="mx-1" for="password_confirmation">
            {{__('users/default-user.confirm_new_password')}}
        </label>
        <input
            wire:model.lazy="password_confirmation"
            autocomplete="new-password"
            type="{{$showPassword ? "text": "password"}}"
            id="password_confirmation"
            value="{{old('password_confirmation')}}"
            name="password_confirmation"
            placeholder="{{__("auth.confirm_password")}}"
            class="bg-body">
    </div>
    <footer class="flex">

        <button class="accent-button px-3 py-2 text-white rounded-md my-2" type="submit" >
            {{__('users/default-user.update_password')}}
        </button>

        <button aria-label="toggle password visibility" type="button" class="outline-none focus:outline-none mx-2" wire:click="togglePasswordVisibility">
            @if($showPassword)
                <svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd"></path><path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z"></path></svg>
            @else
                <svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
            @endif
        </button>
    </footer>
</form>
