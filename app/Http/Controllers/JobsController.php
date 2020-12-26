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

        $query
            ->when($request->query('title'), function ($query, $title) {
                return $query->where('title', 'like', "%" . $title . "%");
            })
            ->when($request->query('location'), function ($query, $location) {
                return $query->where('location', $location);
            })
            ->when($request->query('category'), function ($query, $category) {
                $category = JobType::findByName($category)
                    ->first();
                $query->where('job_type_id', $category->id);
            });

        $result = $query->paginate(25)->withQueryString();
        $viewedJob = empty($request->query('j')) ? $result[0] : Job::find($request->query('j'));

        return view('jobs.index', [
            'jobs' => $result,
            'viewedJob' => $viewedJob,
            'categories' => JobType::all()
        ]);
    }

    public function create()
    {
        return view('jobs.new', [
            'categories' => JobType::all(),
            'prevUrl' => url()->previous()
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

        // it ends with /en or /ku
        // or /en/business or /ku/business
//
//        if ($request->query('prevUrl'))

        return redirect($request->input('prevUrl'))
            ->with('success', __('jobs/new.job_posted'));
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return back()->with('success', __('users/default-user.operation_done'));
    }
}
