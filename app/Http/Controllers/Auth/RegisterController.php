<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\DefaultUser;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'firstName' => ['required', 'string'],
            'lastName' => ['required', 'string'],
            'location' => ['required', 'string'],
            'attachment' => 'mimetypes:application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document | max:2500',
            'mobileNumber' => ['required', 'string', 'unique:users'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['firstName'] . $data['lastName'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'location' => $data['location'] ?? "",
            'mobileNumber' => $data['mobileNumber']
        ]);

        $account = new DefaultUser();
        $account->save();
        $account->user()->save($user);

        if (!empty($data['attachment'])) {
            $attachment = Attachment::of($data['attachment']);

            $account->user->attachment()->save($attachment);
        }


        return $user;
    }
}
