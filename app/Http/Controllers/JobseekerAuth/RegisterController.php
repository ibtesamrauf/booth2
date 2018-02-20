<?php

namespace App\Http\Controllers\JobseekerAuth;

use Illuminate\Http\Request;
use App\Jobseeker;
use App\User;
use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Event;
use App\Events\JobSeekerSignup;
use App\Hashtags;
use App\Marketer_company;
use App\User_roles_hashtags;
use App\Country;
use App\User_previously_campaign;
use App\Marketer_previously_campaign;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    protected $redirectTo = '/';
    
    public function __construct()
    {
        $this->middleware('guest');
    }

    //shows registration form to jobseeker
    public function showRegistrationForm()
    {
        return view('auth.register_2');
    }
    
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        //Create User
        $user = User::create([
            'name'    => $request->name,
            'email'         => $request->email,
            'password'      => bcrypt($request->password),
        ]);
        
        return back()->withAlert('Register successfully');
    }
    
    //Validates user's Input
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    
    //Get the guard to authenticate Jobseeker
    protected function guard()
    {
        return Auth::guard('jobseeker');
    }
}
