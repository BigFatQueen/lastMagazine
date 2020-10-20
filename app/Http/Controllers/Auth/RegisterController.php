<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
       $messages = [
                    'password.regex' => 'Must include one UpperCase, LowerCase ,number and special sign!',
                ];
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string','min:6', 'confirmed','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
        ],$messages);
    }
    // ayechandafe
    //Az.com#a345
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // dd($data);
         $file_extention = $data['avatar']->getClientOriginalExtension();
            $file_name = time().rand(99,999).'avatar.'.$file_extention;
            $file_path = $data['avatar']->move(public_path().'/users/image',$file_name);

            

        $user=User::create([
            'name' => $data['name'],
            'avatar'=>$file_path,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

        ]);
        $user->assignRole('guest');
        return $user;
    }

    protected function registered(Request $request, $user)
    {
        return redirect('/announce');
    }
}
