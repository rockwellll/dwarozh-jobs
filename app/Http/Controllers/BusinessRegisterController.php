<?php

namespace App\Http\Controllers;

use App\Models\BusinessUser;
use App\Models\Image;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class BusinessRegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'location' => ['required', 'string'],
            'mobileNumber' => ['required', 'string', 'unique:users'],
            'attachment' => 'mimetypes:image/*'
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'location' => $data['location'],
            'mobileNumber' => $data['mobileNumber'],
        ]);

        $account = BusinessUser::create();
        $account->user()->save($user);

        $originalName = $data['attachment']->getClientOriginalName();
        $name =  $data['attachment']->hashName();
        $path = time() . '_' . $data['attachment']->storeAs('uploads', $name, 'public');
        $image = new Image([
            'name' => $name,
            'url' => $path,
            'user_id' => $user->id
        ]);

        $image->save();
        return $user;
    }

    public function index()
    {
        return view('auth.business-register');
    }
}
