<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DefaultUserController extends Controller
{
    public function show(Request $request)
    {
        return view('users.profiles.default', [
            'user' => auth()->user()
        ]);
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->input('id'));

        $user->deleteSelfAndRelatedData();
        Auth::logout();
        return redirect("/" . app()->getLocale());
    }
}
