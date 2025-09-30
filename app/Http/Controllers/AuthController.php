<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function showLogin()
    {
        if (Auth::check()) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.appointments.index');
            }
            return redirect()->route('user.pets.index');
        }
        return view('home');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'contact' => 'required|string|min:11|max:13',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);
        $user = User::create($data);
        Auth::login($user);

        return redirect(route('user.pets.index'));
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            switch (Auth::user()->role) {
                case 'admin':
                case 'staff':
                    return redirect()->route('admin.appointments.index');
                case 'user':
                default:
                    return redirect()->route('user.pets.index');
            }

        }

        throw ValidationException::withMessages([
            'error' => 'Invalid credentials!',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
