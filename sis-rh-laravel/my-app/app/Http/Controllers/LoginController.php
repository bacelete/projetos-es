<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
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

    public function login(LoginRequest $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        Auth::guard('gestor')->logout();
        Auth::guard('rh')->logout();

        $credentials = $request->validated(); 

        foreach (['rh', 'gestor'] as $guard) {
            if (Auth::guard($guard)->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('solicitacoes');
            }
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas estão incorretas.',
        ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate(); //flush the session and regenerate the id 
        $request->session()->regenerateToken(); //regera o token csrf

        return redirect()->route('login');
    }
}
