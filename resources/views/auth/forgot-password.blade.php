@extends('auth.auth-layout')
@section('title', 'Recupération mot de passe ')

@section('content')
    <div class="login-right-wrap">
        <x-auth-session-status class="mb-3 alert alert-success" :status="session('status')" />
        <h1>Mot de passe oublie?</h1>

        <p class="account-subtitle">Entrer votre email pour obtenier le lien de rénitialisation</p>
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="form-group">
                <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Email">
                @error('email')
                    <small class="text-danger"> {{ $message }} </small>
                @enderror
            </div>
            <div class="form-group mb-0">
                <button class="btn btn-primary btn-block" type="submit">Recevoir le lien</button>
            </div>
        </form>
        <div class="text-center dont-have">Vous vous souvenez de votre mot de passe? <a href="{{ route('login') }}">Se
                connecter</a>
        </div>
    </div>
@endsection
