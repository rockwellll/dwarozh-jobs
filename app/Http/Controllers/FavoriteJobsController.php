<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class FavoriteJobsController extends Controller
{
    public function destroy(Job $job) {
        $user = auth()->user()->userable;
        $job->removeFavorite($user->id);

        return redirect()->back();
    }
}
