<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Pasien;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // pastikan file ada di resources/views/login.blade.php
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            // Redirect berdasarkan role
            if (auth()->user()->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Selamat datang, Admin!');
            } elseif (auth()->user()->role === 'dokter') {
                return redirect()->route('dokter.dashboard')->with('success', 'Selamat datang, Dokter!');
            } else {
                return redirect()->route('pasien.dashboard')->with('success', 'Selamat datang!');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput($request->only('email', 'remember'));
    }

    public function showRegisterForm()
    {
        return view('auth.register'); // pastikan file ada di resources/views/register.blade.php
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
            'no_ktp' => 'required|string|max:16|unique:pasiens,no_ktp',
        ]);

        try {
            DB::beginTransaction();

            // Buat user baru
            $user = User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'pasien'
            ]);

            // Generate nomor rekam medis
            $lastPasien = Pasien::orderBy('created_at', 'desc')->first();
            $noRM = $lastPasien ? sprintf('%06d', intval(substr($lastPasien->no_rm, -6)) + 1) : '000001';

            // Buat data pasien
            $pasien = Pasien::create([
                'no_rm' => $noRM,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'no_ktp' => $request->no_ktp,
                'user_id' => $user->id
            ]);

            DB::commit();

            // Login otomatis setelah registrasi
            Auth::login($user);

            return redirect()->route('pasien.dashboard')
                ->with('success', 'Registrasi berhasil! Nomor Rekam Medis Anda: ' . $pasien->no_rm);

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.')
                ->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // Hapus semua session yang tersisa
        $request->session()->flush();
        
        return redirect('/')->with('success', 'Anda berhasil logout');
    }
}