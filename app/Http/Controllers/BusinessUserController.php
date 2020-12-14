<?php

namespace App\Http\Controllers;

use App\Models\BusinessUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BusinessUserController extends Controller
{
    public function index()
    {
        return view('business-user', [
            'PostedJobs' => BusinessUser::all(),
        ]);
    }

    public function edit()
    {
        return view('users.business.edit', [
            'user' => auth()->user()->userable
        ]);
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->input('id'));

//        $user->userable->delete();
        if (!is_null($user->attachment)) {
            Storage::delete($user->attachment->url);
        }

        $user->delete();
        Auth::logout();

        return redirect("/" . app()->getLocale())->with([
            'notice' => __('users/default-user.operation_done'),
            'class' => 'text-green-500 text-2xlre']
        );
    }
}
