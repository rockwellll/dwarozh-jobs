<form wire:submit.prevent="updateResume" class="w-full flex flex-col items-center">
    @if (session()->has('success'))
        <h1 class="text-xl text-primary">
            {{ session('success') }}
        </h1>
    @endif


    <div class="flex w-full md:w-2/5 flex-col">
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
            <span wire:ignore id="chosenFile" class="text-gray-500">
                                    @empty($user->attachment)
                    {{__('auth.no_file_selected')}}
                @else
                    {{$user->attachment->name}}
                @endempty
                                 </span>
        </div>
        <input type="file" wire:model.defer="attachment" id="file" style="display: none;"
               accept=".docx,application/msword, .pdf, application/pdf">
        @error('attachment')
        <span class="text-red-400">{{$message}}</span>
        @enderror
    </div>


    <button type="submit" class="accent-button py-2 px-3 my-2 text-white rounded-md">
        Update Resume
    </button>
</form>
