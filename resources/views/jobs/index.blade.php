@extends('layouts.app')

@section('title')
    {{__('page-title.jobs.index')}}
@endsection

@section('description')
    {{__('page-description.jobs.index')}}
@endsection

@section("content")


    <div class="flex flex-col justify-center items-center">
        <div class="w-full md:w-11/12 xl:w-8/12 flex-col justify-center items-center">
            @include('partials.job-search')
        </div>

        <div
            class="flex flex-col md:flex-row sm:flex-col lg:flex-row xl:flex-row justify-center lg:p-5 mt-5 w-full rounded-md">
            @if(is_null($viewedJob))
                @include("jobs.partials.no-jobs")
            @else
                @include("jobs.partials.jobs")
            @endif
        </div>
    </div>
    </div>

@endsection
