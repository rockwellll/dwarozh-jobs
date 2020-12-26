<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class CloseJobController extends Controller
{
    public function update(Job $job) {
        $job->is_closed = true;
        $job->save();

        return back()->with('success', __('users/default-user.operation_done'));
    }
}
