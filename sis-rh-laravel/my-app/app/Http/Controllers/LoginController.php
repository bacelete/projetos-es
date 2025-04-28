<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show(): View
    {
        return view('auth.login'); 
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt([$email, $password])) {
            return redirect()->intended('gerar-solicitacao'); 
        }
        return back()->withErrors([
            'email' => 'O e-mail e/ou a senha estão inválidos.',
        ]);
    }
}
