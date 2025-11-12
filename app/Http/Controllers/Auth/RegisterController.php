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
                // table name is lowercase 'user' and column is 'Email' in your DB
                Rule::unique('user', 'Email'),
            ],
            'password' => ['required','string','min:4'],
        ]);

        // create user (plain-text password for demo)
        $user = User::create([
            // map form inputs to the exact DB column names (case-sensitive)
            'Nama'     => $data['name'],
            'Email'    => $data['email'],
            'Password' => $data['password'],
            // optionally set a default role/jabatan if you want
            'Jabatan'  => 'User',
        ]);

        // Create session entries to mark user as logged in
        session([
            'user_id'   => $user->IDUser,
            'user_name' => $user->Nama,
        ]);

        // Redirect to protected home
        return redirect('/')->with('success', 'Account created and logged in.');
    }
}
