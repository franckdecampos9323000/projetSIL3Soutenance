<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('content')
<br>        <br>
<div class="col-12">
    <a href="{{ route('Accueil.index') }}" class="btn btn-primary">
        <h3 class="breadcrumb-title">Retour à l'accueil</h3>
    </a>
</div>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="width: 25rem;">
        <div class="card-body">
            <h5 class="card-title text-center mb-4">Se connecter</h5>
            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe :</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Se souvenir de moi</label>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
                <a href="#" class="btn btn-link btn-block">Mot de passe oublié ?</a>
            </form>
            <hr>
            <div class="text-center">
                <p>Vous n'avez pas de compte ? <a href="{{ route('register') }}">S'inscrire</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
