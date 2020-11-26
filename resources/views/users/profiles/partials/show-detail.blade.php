<nav class="w-full flex justify-end">
    <a href="{{route('users.default-user-profile', ['locale' => app()->getLocale()])}}?tab=update" class="text-orange-600 hover:text-orange-500">
        {{__('users/default-user.edit_information')}}
    </a>
</nav>

<ul class="text-xl">
    <li class="my-2">
        {{__('users/default-user.username', ['name' => $user->name])}}
    </li>
    <li class="my-2">
        {{__('users/default-user.email', ['email' => $user->email])}}
    </li>
    <li class="my-2">
        {{__('users/default-user.account_type')}}
    </li>
    <li class="my-2">
        {{__('users/default-user.location', ['location' => $user->location])}}
    </li>

    @if(!empty($user->attachment))
        <li class="my-2">
            {{__('users/default-user.resume')}}

            <a class="link" href="{{ Storage::url($user->attachment->url)  }}">
                {{$user->attachment->name}}
            </a>
        </li>
        @endif
</ul>
