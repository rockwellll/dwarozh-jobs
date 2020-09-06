<?php

namespace App\Http\Controllers;

use App\BusinessUser;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BusinessRegisterController extends Controller
{
    use RegistersUsers;

    protected function validator(array $data) {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'location' => ['required', 'string'],
            'mobileNumber' => ['required', 'string'],
        ]);
    }

    protected function create(array $data) {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'location' => $data['location'],
//            'mobileNumber' => $data['mobileNumber'],
        ]);

        $account = BusinessUser::create();
        $account->user()->save($user);
        return $user;
    }

    public function index() {
        return view('auth.business-register');
    }
}
