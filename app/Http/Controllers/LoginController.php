<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 


class LoginController extends Controller
{
    public function __construct()
    {
        // CORREGIDO: Es 'logout', no 'logount'
        $this->middleware('guest')->except(['logout']);
        $this->middleware('auth')->only(['logout']);
    }

    public function show()
    {
        return view('aut_login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'El email es requerido',
            'password.required' => 'La contraseña es requerida'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'is_active' => 1
        ];

        if (Auth::attempt($credentials, $request->remember)) {
            // CORREGIDO: Es 'session()', no 'seccion()'
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()
            ->withErrors([
                'email' => 'Credenciales incorrectas',
            ])
            ->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
   
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
} 

