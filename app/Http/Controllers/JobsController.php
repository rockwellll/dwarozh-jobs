<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobType;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index(Request $request)
    {
        $query = Job::query();
        $title = $request->query('title');
        $location = $request->query('location');
        $category = $request->query('category');

        $query
            ->when($title, function ($query, $title) {
                return $query->where('title', 'like', "%" . $title . "%");
            })->when($location, function ($query, $location) {
                return $query->where('location', $location);
            })->when($category, function ($query, $category) {
                $category = JobType::findByName($category)
                    ->first();
                $query->where('job_type_id', $category->id);
            });

        return view('jobs.index', [
            'jobs' => $query->paginate(50),
            'categories' => JobType::all()
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
