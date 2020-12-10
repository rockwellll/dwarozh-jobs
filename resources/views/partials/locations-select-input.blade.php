<select aria-label="{{__('auth.location')}}" name="location" id="location"
        class="@error('location') border-red-500 @enderror">
    <option disabled selected value class="text-gray-500"> {{__('auth.select_location')}} </option>
    @foreach(array_keys(__('auth.locations')) as $l )
        <option @if(old('location') == $l || request()->query("location") == $l)
                selected
                @endif
                value="{{$l}}"
                aria-label="{{__('auth.locations')[$l]}}"
        >
            {{__('auth.locations')[$l]}}
        </option>
    @endforeach
</select>
