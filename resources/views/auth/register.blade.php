@extends('auth.auth-layout')
@section('title', "Page d'inscription ")

@section('content')
    <h1 class="mb-3">S'inscrire</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group">
            <input class="form-control" name="name" value="{{ old('name') }}" type="text" placeholder="Nom">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <input class="form-control" name="email" value="{{ old('email') }} " type="email" placeholder="Email">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <input class="form-control" name="password" type="password" placeholder="Mot de passe">
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <input class="form-control" type="password" name="password_confirmation" placeholder="Confirmer Mot de passe">
        </div>
        <div class="form-group mb-0">
            <button class="btn btn-primary btn-block" type="submit">S'inscrire</button>
        </div>
    </form>
    <div class="text-center dont-have">Vous avez deja un compte? <a href="{{ route('login') }}">Se connecter</a> </div>

@endsection
