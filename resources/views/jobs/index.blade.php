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

        <livewire:jobs-index :viewedJob="$viewedJob" :jobs="$jobs->items()"/>
    </div>

@endsection
