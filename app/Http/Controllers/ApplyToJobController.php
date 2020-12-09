<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class ApplyToJobController extends Controller
{
    public function store(Job $job, Request $request) {
        $job->applicants()->attach(auth()->user()->userable->id);

        return back()->with("success", __('users/default-user.operation_done'));
    }

    public function destroy(Job $job) {
        $job->applicants()->detach(auth()->user()->userable->id);

        return back()->with("success", __('users/default-user.operation_done'));
    }
}
