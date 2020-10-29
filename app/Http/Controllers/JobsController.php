<?php

namespace App\Http\Controllers;

use App\Models\JobType;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function create() {
        return view('jobs.new', [
            'categories' => JobType::all()
        ]);
    }

    public function store() {

    }
}
