<form
    wire:submit.prevent="submit"
    class="w-full md:w-4/5 lg:w-2/3 text-accent text-sm md:text-base bg-white rounded-md p-1 md:p-10 shadow-lg">
    <header class="my-2">
        <h1 class="text-xl md:text-2xl text-primary">
            {{__('jobs/new.post-job')}}
        </h1>
    </header>
    <section class="w-full">
        <label for="title" class="md:text-xl">
            {{__('jobs/new.title')}}
        </label>

        <input
            wire:model.lazy="title"
            class="bg-gray-100 focus:bg-transparent mt-4"
            type="text"
            id="title"
            name="title">

        @error('title')
        <small class="text-red-500">
            {{$message}}
        </small>
        @enderror
    </section>

    <section class="flex justify-around items-center my-3">
        <div class="w-full md:w-5/12 flex flex-col">
            <label for="category" class="md:text-xl">
                {{__('jobs/new.job_type')}}
            </label>
            <select wire:model.lazy="category" name="category" id="category" class="mt-2">
                @foreach($categories as $category)
                    <option value="{{__('home-page.job_types')[$category->name]}}">
                        {{__('home-page.job_types')[$category->name]}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="w-full md:w-5/12 flex flex-col">
            <label for="deadline" class="md:text-xl">
                {{__('jobs/new.deadline')}}
            </label>
            <input
                wire:model.lazy="deadline"
                type="date"
                id="deadline"
                name="deadline"
                min="{{now()->toDateString('y-m-d')}}">

            @error('deadline')
            <small class="text-red-500">
                {{$message}}
            </small>
            @enderror
        </div>
    </section>

    <section class="w-full flex flex-col md:flex-row my-5 justify-around items-center">
        <div class="w-5/12">
            <label for="company_location">
                {{__('jobs/new.company_location')}}
            </label>

            <input type="text" id="company_location"
                   name="company-location"
                   value="{{auth()->user()->location}}">
        </div>

        <div class="w-5/12">
            <label for="location">
                {{__('jobs/new.location')}}
            </label>

            @include('partials.locations-select-input')
        </div>
    </section>


    <section class="trix-container overflow-hidden">
        @trix(\App\Models\Job::class, 'description')
    </section>

    <hr class="my-5 bg-gray-100" />

    <button type="submit">Submit</button>
</form>
