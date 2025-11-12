<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    // handle POST /login
    public function store(Request $request)
    {
        $data = $request->validate([
            'email'    => ['required','email'],
            'password' => ['required','string'],
        ]);

        // find user by email
        $user = User::where('email', $data['email'])->first();

        if (! $user) {
            return back()->withErrors(['email' => 'No account found with this email.'])->withInput();
        }

        // plain-text comparison (DEMO only)
        if ($user->Password !== $data['password']) {
            return back()->withErrors(['password' => 'Incorrect password.'])->withInput();
        }

        // set session to mark as logged in
        session([
            'user_id'   => $user->IDUser,
            'user_name' => $user->Nama ?? $user->name ?? $user->email,
        ]);

        // redirect to intended (or home)
        return redirect()->intended('/');
    }
}
