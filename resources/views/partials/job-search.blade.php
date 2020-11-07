<form action="" class="flex flex-col md:flex-row justify-around items-center bg-white rounded-md">
    <div class="flex flex-col md:flex-row w-full md:w-8/12 px-3 md:px-0">
        <div class=" m-2 w-full">
            <input id="job" name="job" class="bg-body text-sm" type="text" placeholder="{{__('home-page.Search for jobs')}}">
        </div>
        <div class=" m-2 w-full">
            @include('partials.locations-select-input')
        </div>
    </div>

    <button class="px-3 py-2 my-1 primary-button focus:outline-none focus:shadow-outline"
            style="width: 10rem">
        {{__('home-page.Search')}}
    </button>
</form>
