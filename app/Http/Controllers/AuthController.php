<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Married;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterAccountRequest;

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
            // dump(Auth()->user()->role);
            if (Auth()->user()->role === 'catin') {
                return redirect()->intended('catin/beranda');
            } elseif (Auth()->user()->role === 'staff') {
                return redirect()->intended('staff/pernikahan');
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
        $data = $request->only(['name', 'nik', 'email', 'username', 'password']);
        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'catin';

        DB::beginTransaction();

        try {
            $user = User::create($data);

            $married = Married::create([
                'users_id' => $user->id,
                'registration_number' => $user->id . time()
            ]);

            $married->notifications()->create([
                'description' => 'Akun telah berhasil dibuat',
                'message' => 'Sukses',
                'type' => 'success',
                'is_read' => true
            ]);

            DB::commit();

            return redirect()->route('login')
                ->with('success', 'Akun anda telah berhasil didaftarkan');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
