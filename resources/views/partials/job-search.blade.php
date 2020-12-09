<form id="search" action="{{route('jobs.index', ['locale' => app()->getLocale()])}}"
      class="flex flex-col md:flex-row justify-around items-center bg-white rounded-md">
    <div class="flex flex-col md:flex-row w-full md:w-10/12 px-3 md:px-0 items-center">
        <div class="m-2 w-full md:w-5/12">
            <input
                aria-label="{{__("home-page.Search")}}"
                value="{{request()->query('title')}}"
                id="job"
                name="title"
                class="bg-body text-sm"
                type="text"
                placeholder="{{__('home-page.Search for jobs')}}">
        </div>
        <div class="m-2 w-full flex flex-col md:flex-row md:w-8/12 justify-center items-center">
                <div class="w-full md:w-6/12">
                    @include('partials.locations-select-input')
                </div>

               <div class="w-full md:w-6/12 md:mx-2">
                   <select aria-label="{{__('jobs/new.job_type')}}"  name="category" id="category" class="w-full">
                       <option disabled selected value class="text-gray-500"> {{__('jobs/new.job_type')}} </option>
                       @foreach($categories as $category)
                           <option
                               @if(request()->query('category') == $category->name)
                                  selected
                               @endif
                                   aria-label=" {{__('home-page.job_types')[$category->name]}}"
                               value="{{$category->name}}">
                               {{__('home-page.job_types')[$category->name]}}
                           </option>
                       @endforeach
                   </select>
               </div>
        </div>
    </div>

    <button type="submit" class="px-3 py-2 my-1 primary-button focus:outline-none focus:shadow-outline"
            style="width: 10rem">
        {{__('home-page.Search')}}
    </button>
</form>

{{--@push("scripts")--}}
{{--    <script defer type="text/javascript">--}}
{{--        document.getElementById("search").addEventListener("submit", function (e) {--}}
{{--            if(document.getElementById("job").value === "") {--}}
{{--                document.getElementById("job").remove();--}}
{{--            }--}}

{{--            this.submit();--}}
{{--        });--}}
{{--    </script>--}}
{{--@endpush--}}
