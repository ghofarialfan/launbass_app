<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
    // Rute #1: Tampilkan form lupa password
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    // Rute #2: Proses pengiriman kode
    public function sendResetCodeEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Format email tidak valid.',
            'email.exists' => 'Email ini tidak terdaftar di sistem kami.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $email = $request->email;
        $code = rand(1000, 9999);

        Session::put('reset_email', $email);
        Session::put('reset_code', $code);

        Log::info("KODE RESET PASSWORD untuk $email adalah: $code");

        return redirect()->route('password.code.form');
    }

    // Rute #3: Tampilkan form verifikasi kode
    public function showVerifyCodeForm()
    {
        if (!Session::has('reset_email')) {
            return redirect()->route('password.request');
        }
        $email = Session::get('reset_email');
        return view('auth.verify-code', ['email' => $email]);
    }

    // Rute #4: Proses verifikasi kode
    public function verifyCode(Request $request)
    {
        $request->validate([
            'code' => 'required|numeric|digits:4',
        ]);

        if (Session::get('reset_code') == $request->code) {
            Session::put('code_verified', true);
            Session::forget('reset_code');
            return redirect()->route('password.reset.form');
        } else {
            return redirect()->back()->with('error', 'Kode verifikasi salah. Coba lagi.');
        }
    }

    // Rute #5: Tampilkan form reset password
    public function showResetPasswordForm()
    {
        if (!Session::get('code_verified') || !Session::get('reset_email')) {
            return redirect()->route('password.request')->with('error', 'Sesi tidak valid.');
        }
        return view('auth.reset-password');
    }

    // Rute #6: Proses simpan password baru
    public function resetPassword(Request $request)
    {
        // Cek validitas session
        if (!Session::get('code_verified') || !Session::get('reset_email')) {
            return redirect()->route('password.request')->with('error', 'Sesi Anda telah berakhir.');
        }

        // Validasi password baru
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ], [
            'password.required' => 'Password baru tidak boleh kosong.',
            'password.min' => 'Password baru minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $email = Session::get('reset_email');
        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->route('password.request')->with('error', 'User tidak ditemukan.');
        }

        // Update password
        $user->password = Hash::make($request->password);
        $user->save();

        // Hapus session
        Session::forget('reset_email');
        Session::forget('code_verified');

        // Redirect ke halaman lupa password dengan notifikasi sukses
        return redirect()->route('password.request')->with('success', 'Password berhasil diubah!');
    }
}
