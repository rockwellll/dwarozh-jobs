<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessUser;

class BusinessUserController extends Controller
{
    public function index() {
        return view('business-user',[
            'PostedJobs' => BusinessUser::all(),
        ]);
    }
}
