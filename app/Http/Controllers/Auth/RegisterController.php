<?php
// File: app/Http/Controllers/Auth/RegisterController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Donatur;
use App\Models\Komunitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Menampilkan form registrasi untuk donatur.
     */
    public function showChoiceForm()
    {
        return view('auth.register-choice'); // Kita akan buat view ini di langkah berikutnya
    }

    public function showDonaturForm()
    {
        return view('auth.register-donatur');
    }

    /**
     * Menampilkan form registrasi untuk komunitas.
     */
    public function showKomunitasForm()
    {
        return view('auth.register-organisasi');
    }

    /**
     * Menangani permintaan registrasi donatur.
     */
    public function registerDonatur(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'domicile' => ['required', 'string', 'max:100'],
            'agree_terms' => ['accepted'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'donatur',
        ]);
        
        // Sesuaikan 'domicile' di sini dengan nama kolom di tabel 'donaturs' Anda
        // Saya asumsikan nama kolomnya adalah 'domisili'
        Donatur::create([
            'user_id' => $user->id,
            'domisili' => $request->domicile,
        ]);

        Auth::login($user);
        return redirect()->route('donatur.dashboard');
    }

    /**
     * Menangani permintaan registrasi komunitas.
     */
    public function registerOrganisasi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_organisasi' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'], // Nama Penanggung Jawab
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'kategori_organisasi' => ['required', 'string', 'max:100'],
            'document_path' => ['nullable', 'file', 'mimes:pdf', 'max:2048'],
            'agree_terms' => ['accepted'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $documentPath = null;
        if ($request->hasFile('document_path')) {
            $documentPath = $request->file('document_path')->store('legalitas_komunitas', 'public');
        }

        $user = User::create([
            'name' => $request->name, // Nama penanggung jawab
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'komunitas',
        ]);
        
        Komunitas::create([
            'user_id' => $user->id,
            'nama_organisasi' => $request->nama_organisasi,
            'kategori_organisasi' => $request->kategori_organisasi,
            'document_path' => $documentPath,
            'status_validasi' => 'pending', // Default status
        ]);
        
        return redirect()->route('login')->with('success', 'Registrasi komunitas berhasil! Akun Anda akan aktif setelah divalidasi oleh Admin.');
    }
}