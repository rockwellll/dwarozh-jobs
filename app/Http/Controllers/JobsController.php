<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobType;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index() {
        return view('jobs.index', [
            'jobs' => Job::all()
        ]);
    }

    public function create()
    {
        return view('jobs.new', [
            'categories' => JobType::all()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'deadline' => 'required',
            'job-trixFields.content' => 'required',
            'category' => 'required',
            'company-location' => 'required',
            'location' => 'required'
        ]);

        auth()->user()->userable->jobs()->save(new Job([
            'title' => $data['title'],
            'job_type_id' => JobType::where('name', '=', $data['category'])->first()->id,
            'content' => $data['job-trixFields']['content'],
            'deadline' => $data['deadline'],
            'location' => $data['location']
        ]));

        return redirect()
            ->route('home', ['locale' => app()->getLocale()])
            ->with('notice', __('jobs/new.job_posted'));
    }
}
