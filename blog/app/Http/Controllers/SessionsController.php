<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    // Show login form
    public function create()
    {
        return view('sessions.create');
    }

    // Store login
    public function store()
    {
        // get credentials from form
        $user = request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // attempt login with credentials, and login if authenticated
        if (auth()->attempt($user)) {

            // regenerate a session to protect against a 'session fixation' attack
            request()->session()->regenerate();

            // redirect to the homepage with a flash message
            return redirect('/')->with('success', "You've logged in, welcome back.");
        }

        // bounce user back if auth fails
        return back()
            ->withErrors(['username' => 'Invalid Credentials']) // add an error message
            ->onlyInput('username');                           // keep the input filled on the form for the user
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye, see you soon!');
    }
}
