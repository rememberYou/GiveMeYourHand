<?php

namespace GiveMeYourHelp\Http\Controllers\Auth;

use GiveMeYourHelp\User;
use GiveMeYourHelp\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username'             => 'required|alpha_num|min:3|max:35|unique:users',
            'email'                => 'required|email|max:255|unique:users',
            'password'             => 'required|min:8|max:40|confirmed',
            'terms'                => 'required',
            'g-recaptcha-response' => 'required|recaptcha',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {       
        return User::create([
            'username' => $data['username'],
            'role_id' => 1,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);        
    }
}
