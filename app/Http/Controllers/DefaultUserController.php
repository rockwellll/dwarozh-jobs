<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DefaultUserController extends Controller
{
    public function show(Request $request) {
        return view('users.profiles.default', [
            'user' => auth()->user()
        ]);
    }
}
