@extends('layouts.app')

@section('title')
    {{'AMANJ'}}
@endsection

@section('description')

@endsection

@section("content")

    <div class="flex flex-col justify-center">
        <div class="w-full flex flex-col items-center justify-center text-primary text-5xl font-weight-bold">search for jobs  </div>

        <form action="" class="flex flex-col md:flex-row justify-around items-center bg-white rounded-md ">
            <div class="flex flex-col md:flex-row w-full md:w-8/12 px-3 md:px-0">
                <div class=" m-2 w-full">
                    <input class="bg-body text-sm" type="text" placeholder="{{__('home-page.Search for jobs')}}">
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



        <div class="flex flex-col md:flex-row sm:flex-col lg:flex-row xl:flex-row  bg-body justify-center  p-5 mt-5  ">
            <div class=" text-gray-700   text-md  w-auto sm:w-auto md:w-2/12 lg:w-2/12 xl:w-2/12  border rounded border-primary divide-y divide-teal-600 p-4 ">
                <div class=" pt-2">
                    <div class="text-lg font-medium">company Name
                    </div>
                    <div>
                        role name
                    </div>
                    <div>
                        location
                    </div>
                </div>
                <div class=" pt-2">
                    <div class=" text-lg">company Name
                    </div>
                    <div>
                        role name
                    </div>
                    <div>
                        location
                    </div>
                </div>
                <div class=" pt-2">
                    <div class=" text-lg">company Name
                    </div>
                    <div>
                        role name
                    </div>
                    <div>
                        location
                    </div>
                </div>
            </div>

            <div class="  text-gray-700  bg-white w-full sm:w-full md:w-9/12 lg:w-7/12 xl:w-7/12 rounded p-4 ">
                <div class="flex   justify-between">
                    <div class="text-4xl text-gray-700 font-bold font font-serif text-center " >Job Title</div>

                    <div class="flex " >

                        <button class="mx-2 px-3 py-2 primary-button focus:outline-none focus:shadow-outline">Easy Apply</button>
                        <button class="mx-2   pt-2 text-primary font-weight-bold " >
                            <span class="bg-primary " style="height: 10px;width: 10px;border-radius: 50%;display: inline-block;"></span>
                            <span class="bg-primary " style="height: 10px;width: 10px;border-radius: 50%;display: inline-block;"></span>
                            <span class="bg-primary " style="height: 10px;width: 10px;border-radius: 50%;display: inline-block;"></span>
                        </button>

                    </div>

                </div>

                <div class="text-xl">Company Name</div>
                <div class="text-md">location</div>
                <div class="mt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
                <ul class="mt-2 list-disc list-inside">
                    <li class="mt-1">requirement</li>
                    <li class="mt-1">requirement</li>
                    <li class="mt-1">requirement</li>
                </ul>

                <div class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
                <div class="mt-3"> Contact Information</div>
                <ul class="mt-2 list-disc list-inside">
                    <li class="mt-1">Email</li>
                    <li class="mt-1">Mobile</li>
                    <li class="mt-1">Website</li>
                </ul>
            </div>
        </div>
    </div>



@endsection
