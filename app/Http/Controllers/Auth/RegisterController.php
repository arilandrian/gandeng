<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User; // Penting: Import model User
use App\Models\Donatur; // Penting: Import model Donatur
use App\Models\Komunitas; // Penting: Import model Komunitas
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth; // Penting: Untuk login otomatis setelah registrasi

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/'; // Ini akan di-override oleh logika redirect berdasarkan role

    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Menampilkan formulir registrasi Donatur.
     */
    public function showRegisterDonaturForm()
    {
        return view('auth.register-donatur');
    }

    /**
     * Menangani permintaan registrasi Donatur.
     */
    public function registerDonatur(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'domisili' => ['required', 'string', 'max:255'],
            'agree_terms' => ['accepted'], // Pastikan checkbox syarat dan ketentuan di-centang
        ]);

        // Buat user baru dengan role 'donatur'
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'donatur',
        ]);

        // Buat entri Donatur baru yang terkait dengan user ini
        Donatur::create([
            'user_id' => $user->id,
            'domisili' => $request->domisili,
        ]);

        // Login user secara otomatis setelah registrasi berhasil
        Auth::login($user);

        return redirect()->intended(route('donatur.dashboard')); // Arahkan ke dashboard donatur
    }

    /**
     * Menampilkan formulir registrasi Organisasi.
     */
    public function showRegisterOrganisasiForm()
    {
        return view('auth.register-organisasi');
    }

    /**
     * Menangani permintaan registrasi Organisasi.
     * Catatan: Anda perlu membuat route POST untuk ini di web.php
     */
    public function registerOrganisasi(Request $request)
    {
        $request->validate([
            'nama_organisasi' => ['required', 'string', 'max:255'],
            'nomor_telepon' => ['nullable', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'kategori_organisasi' => ['required', 'string', 'in:Sosial,Lingkungan,Pendidikan,Kesehatan,Kemanusiaan'],
            'document_path' => ['nullable', 'file', 'mimes:pdf', 'max:2048'], // Validasi upload PDF max 2MB
            'agree_terms' => ['accepted'],
        ]);

        $documentPath = null;
        if ($request->hasFile('document_path')) {
            $documentPath = $request->file('document_path')->store('public/documents'); // Simpan file di storage
            $documentPath = str_replace('public/', 'storage/', $documentPath); // Ubah ke URL publik
        }

        // Buat user baru dengan role 'komunitas'
        $user = User::create([
            'name' => $request->nama_organisasi, // Nama user diisi nama organisasi
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'komunitas',
        ]);

        // Buat entri Komunitas baru yang terkait dengan user ini
        Komunitas::create([
            'user_id' => $user->id,
            'nama_organisasi' => $request->nama_organisasi,
            'nomor_telepon' => $request->nomor_telepon,
            'kategori_organisasi' => $request->kategori_organisasi,
            'document_path' => $documentPath,
            'status_validasi' => 'pending', // Komunitas baru defaultnya pending validasi
        ]);

        // Anda mungkin tidak ingin otomatis login komunitas sampai dokumen divalidasi oleh admin
        // Auth::login($user); // Komentari baris ini jika tidak ingin otomatis login

        // Redirect ke halaman sukses registrasi atau dashboard komunitas setelah validasi admin
        return redirect()->route('login')->with('success', 'Registrasi komunitas berhasil! Harap tunggu validasi dari admin.');
    }
}