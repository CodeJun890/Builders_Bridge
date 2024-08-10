<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    // HOME PAGE
    public function home(){
        if(auth()->check()){
            return redirect()->route('dashboard.get');
        }else{
            return view('components.Home.home');
        }
    }

    // CONTACT PAGE
    public function contact(){
        if(auth()->check()){
            return redirect()->route('dashboard.get');
        }else{
            return view('components.Home.contact');
        }
    }

    // FAQ PAGE
    public function faq(){
        if(auth()->check()){
            return redirect()->route('dashboard.get');
        }else{
            return view('components.Home.faq');
        }
    }

    // ABOUT PAGE
    public function about(){
        if(auth()->check()){
            return redirect()->route('dashboard.get');
        }else{
            return view('components.Home.about');
        }
    }

    // LOGIN PAGE
    public function login(){
        if(auth()->check()){
            return redirect()->route('dashboard.get');
        }else{
            return view('components.Auth.login');
        }
    }

    public function postLogin(Request $request){
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Get the credentials from the request
        $credentials = $request->only('email', 'password');

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to the intended page or to the dashboard
            return redirect()->route('dashboard.get');
        } else {
            // Authentication failed, redirect back to the login page with error message
            return redirect()->back()->with('incorrectCredential', 'The provided credentials do not match our records.');
        }
    }


    // SIGNUP PAGE
    public function signup(){
        if(auth()->check()){
            return redirect()->route('dashboard.get');
        }else{
            return view('components.Auth.signup');
        }
    }

    public function postSignup(Request $request){
        // Validate the request data
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'firstname' => 'required',
            'middlename' => 'nullable',
            'lastname' => 'required',
            'phoneNumber' => 'nullable',
            'birthday' => 'required|date',
            'gender' => 'required',
        ]);

        // Encrypt the password
        $validatedData['password'] = bcrypt($validatedData['password']);

        try {
            // Create the user
            $user = User::create($validatedData);

            if ($user) {
                // Log the user in
                Auth::login($user);
                // Redirect to the dashboard
                return redirect()->route('dashboard.get');
            }
        } catch (\Exception $error) {
            // Log the exception
            Log::error('Signup Error: '.$error->getMessage());
            // Redirect back with an error message
            return redirect()->back()->with('error', 'There was an issue creating your account, please try again.');
        }

        // Fallback redirect
        return redirect('login')->with('error', 'There was an issue creating your account, please try again.');
    }


    // LOGOUT
    public function logout(){
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
