<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // Show register form
    public function create(){
        return view('register.create');
    }

    // Store new user register
    public function store() {
        // Build user from POST request
        $attributes = request()->validate([
            'name' => 'required|max:255', // 'max:255' is a guard against informaiton longer than an SQL databases' varchar
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed|min:7|max:255',
        ]);

        // Hash password
        $attributes['password'] = bcrypt($attributes['password']);

        // Save user to database
        $user = User::create($attributes);

        // Log user in
//        auth()->login($user);

        // Redirect to homepage
        return redirect('/');

    }
}
