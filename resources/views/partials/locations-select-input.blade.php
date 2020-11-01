<select required name="location" id="location"
        class="@error('location') border-red-500 @enderror">
    <option disabled selected value class="text-gray-500"> {{__('auth.select_location')}} </option>
    @foreach(array_keys(__('auth.locations')) as $l)
        <option @if(old('location') == $l)
                selected
                @endif
                value="{{$l}}"
        >
            {{__('auth.locations')[$l]}}
        </option>
    @endforeach
</select>
