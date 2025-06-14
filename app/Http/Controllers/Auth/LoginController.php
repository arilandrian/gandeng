<?php
// File: app/Http/Controllers/Auth/LoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    protected function redirectTo()
    {
        $user = Auth::user();
        switch ($user->role) {
            case 'admin':
                return route('admin.dashboard');
            case 'komunitas':
                return route('komunitas.dashboard');
            case 'donatur':
                return route('donatur.dashboard');
            default:
                return route('landing'); // Fallback ke landing page jika role tidak ada
        }
    }

    public function __construct()
    {
        // Middleware guest sudah ditangani di routes/web.php
        // jadi kita bisa membiarkan konstruktor ini kosong atau
        // menambahkan middleware di sini jika diperlukan.
        // $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Kita tidak perlu lagi meng-override method login() karena
    // trait AuthenticatesUsers akan secara otomatis menggunakan
    // method redirectTo() yang sudah kita definisikan di atas.
    // Logika pengalihan Anda sudah aman.

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return $this->loggedOut($request) ?: redirect(route('landing'));
    }
}