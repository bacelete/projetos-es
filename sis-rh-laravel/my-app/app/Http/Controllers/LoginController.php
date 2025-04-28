<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function show(): View
    {
        return view('auth.login'); 
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) { 
            $request->session()->regenerate(); //regenera o id da sessão a cada login (segurança)
            return redirect()->intended('solicitacoes'); 
        }
        return back()->withErrors([
            'email' => 'O e-mail e/ou a senha estão inválidos.',
        ]);
    }

    public function logout(Request $request) : RedirectResponse
    {
        Auth::logout(); 

        $request->session()->invalidate(); //flush the session and regenerate the id 
        $request->session()->regenerateToken(); //regera o token csrf

        return redirect()->route('login');
    }
}
