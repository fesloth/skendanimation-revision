<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login', [
            "title" => "Login"
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user(); // Ambil pengguna yang berhasil login

            // Simpan catatan login ke dalam tabel logins
            Login::create([
                'user_id' => $user->id,  // ID pengguna yang berhasil login
                'login_at' => now(),      // Waktu login
            ]);

            // Redirect sesuai dengan peran pengguna
            if ($user && $user->status === 'Admin') {
                return redirect()->intended('/admin');
            }

            return redirect()->intended('/');
        }

        // Jika login gagal
        return redirect()->back()->withInput($request->only('email'))->withErrors(['email' => 'Email atau password salah']);
    }

    public function showLoginFormSiswa()
    {
        return view('auth.loginSiswa', [
            "title" => "Login Siswa"
        ]);
    }

    public function loginSiswa(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'nis'  => 'required|numeric',
        ]);

        // Cari user berdasarkan NIS dan Nama Lengkap
        $user = User::where('nis', $request->nis) // sesuaikan dengan kolom 'nis'
            ->where('nama', $request->nama)
            ->where('status', 'Murid') // pastikan status adalah 'Murid'
            ->first();

        // Jika user ditemukan, loginkan
        if ($user) {
            Auth::login($user);

            // Simpan catatan login ke dalam tabel logins
            Login::create([
                'user_id' => $user->id,  // ID pengguna yang berhasil login
                'login_at' => now(),      // Waktu login
            ]);

            return redirect()->intended('/');
        }

        // Jika user tidak ditemukan, tampilkan error
        return back()->withErrors(['nis' => 'Nama atau NIS salah.']);
    }

    public function showRegistrationForm()
    {
        return view('auth.register', [
            "title" => "Register"
        ]);
    }
 
    public function register(Request $request) 
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ], [
            'email.unique' => 'Email sudah digunakan.',
            'password.min' => 'Password minimal harus 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
        ]);

        $user = User::create([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'status' => 'Lainnya',
        ]);

        $user->user_id = $user->id;
        $user->save();

        Session::flash('success', 'Registrasi berhasil, silahkan login.');

        return redirect()->route('login');
    }

    public function editNis()
    {
        return view('auth.edit-nis', [
            'user' => auth()->user(),
            'title' => 'Edit NIS'
        ]);
    }

    public function updateNis(Request $request)
    {
        // Validasi input
        $request->validate([
            'previous_nis' => 'required|integer',
            'nis' => 'required|integer',
            'confirm_nis' => 'required|same:nis',
        ], [
            'confirm_nis.same' => 'Konfirmasi Sandi tidak sesuai.',
            'nis.integer' => 'Sandi baru harus berupa angka.',
        ]);

        $user = auth()->user();

        // cek apakah nis sebelumnya yg diimput user benar
        if ($request->previous_nis != $user->nis) {
            \log::error('Failed NIS update attempt: Previous NIS mismatch.', [
                'input_previous_nis' => $request->previous_nis,
                'actual_nis' => $user->nis,
            ]);

            return back()->withErrors(['previous_nis' => 'NIS sebelumnya tidak sesuai.']);
        }

        // update pw
        $user->nis = $request->nis;
        $user->save();

        return redirect()->route('profile')->with('success', 'NIS berhasil diperbarui.');
    }
}
