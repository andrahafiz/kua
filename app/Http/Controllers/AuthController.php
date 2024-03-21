<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterAccountRequest;
use App\Models\Married;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            if (Auth()->user()->role === 'catin') {
                return redirect()->intended('catin.home');
            } elseif (Auth()->user()->role === 'staff') {
                return redirect()->intended('staff/dashboard');
            } elseif (Auth()->user()->role === 'kakua') {
                return redirect()->intended('kakua/dashboard');
            }
        } else {
            return view('pages.auth-login');
        }
    }

    public function login_aksi(Request $request)
    {
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt(['username' => $data['username'], 'password' => $data['password']])) {
            if (Auth()->user()->role === 'catin') {
                return redirect()->intended('catin/beranda');
            } elseif (Auth()->user()->role === 'staff') {
                return redirect()->intended('staff/dashboard');
            } elseif (Auth()->user()->role === 'kakua') {
                return redirect()->intended('kakua/dashboard');
            } else {
                return back()->withErrors([
                    'error' => 'Role tidak ditemukan',
                ])->withInput($request->only('username'));
            }
        } else {
            return back()->withErrors([
                'error' => 'Username atau passowrd tidak ditemukan',
            ])->withInput($request->only('username'));
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }

    public function register(Request $request)
    {
        if (Auth::check()) {
            if (Auth()->user()->role === 'catin') {
                return redirect()->intended('catin.home');
            } elseif (Auth()->user()->role === 'staff') {
                return redirect()->intended('staff/dashboard');
            } elseif (Auth()->user()->role === 'kakua') {
                return redirect()->intended('kakua/dashboard');
            }
        } else {
            return view('pages.auth-register');
        }
    }

    public function register_aksi(RegisterAccountRequest $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
        ];

        try {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
            'role' => 'catin'
        ]);

        Married::create([
            'users_id' => $user->id,
            'registration_number' => $user->id . time()
        ]);

        return redirect()->route('login')
            ->with('success', "Akun anda telah berhasil didaftarkan");
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
