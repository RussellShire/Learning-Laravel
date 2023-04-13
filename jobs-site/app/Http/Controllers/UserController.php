<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show register form
    public function create(){
        return view('users.register');
    }

    // Create form data
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
        ]);

        // hash password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return redirect('/')->with('message', 'User Created and Logged In');
    }

    // Logout
    public function logout(Request $request){
        auth()->logout(); // Logout

        $request->session()->invalidate(); // Invalidate session
        $request->session()->regenerateToken(); // Create new Csrf token

        return redirect('/')->with('message', 'You have been logged out');
    }

    // Show login form
    public function login() {
        return view('users.login');
    }
}
