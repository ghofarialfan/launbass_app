<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    // show register form
    public function show()
    {
        return view('register');
    }

    // handle POST /register
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => [
                'required','string','email','max:255',
                Rule::unique('User','email'), // change table name if needed
            ],
            'password' => ['required','string','min:4'],
        ]);

        // create user (plain-text password for demo)
        $user = User::create([
            'Nama' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        // Create session entries to mark user as logged in
        // Store the primary key and any needed display info
        session([
            'user_id'   => $user->IDUser,
            'user_name' => $user->name,
            // add any other metadata you want in session
        ]);

        // (Optional) set a "remember" cookie/time - session lifetime controlled in config/session.php
        // Redirect to home (protected) or anywhere you want
        return redirect('/')->with('success', 'Account created and logged in.');
    }
}
