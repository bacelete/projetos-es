@extends('layouts.navbar')

@section('title', 'Login')
@section('content')

<div class="login-box">
        <h1 id="titulo-login">Login</h1>
        <form action="/login" method="post">
            @csrf
            <div class="box-input">
                <i class="fa-solid fa-envelope"></i>
                <input type="text" name="email" placeholder="Digite seu email">
            </div>
            <div class="box-input">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" placeholder="Digite sua senha">
            </div>
            <button class="login-button" type="submit">Entrar</button>
        </form>
</div>
@endsection