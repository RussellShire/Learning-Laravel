<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            'name' => 'required|max:255',   // 'max:255' is a guard against informaiton longer than an SQL databases' varchar
            'username' => 'required|min:3|max:255|unique:users,username',   // unique:[table],[column] on the database
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],    // Example of alternative syntax for validation (requires importing 'Rule')
            'password' => 'required|confirmed|min:7|max:255',
        ]);

        // Hash password
        // NOTE: Moved to user model under setPasswordAttribute Eloquent Mutator.
//        $attributes['password'] = bcrypt($attributes['password']);

        // Save user to database
        $user = User::create($attributes);

        // Feedback to user with flash message
        // NOTE: superceeded by '->with([...])' on redirect, keeping for reference
//        session()->flash('success', 'Your account has been created');

        // Log user in
        auth()->login($user);

        // Redirect to homepage
        return redirect('/')->with('success', 'Your account has been created!');

    }
}
