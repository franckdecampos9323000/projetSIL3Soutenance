<!-- resources/views/auth/register.blade.php -->
@extends('layouts.app')

@section('content')
<br> <br>
<div class="col-12">
    <a href="{{ route('Accueil.index') }}" class="btn btn-primary">
        <h3 class="breadcrumb-title">Retour à l'accueil</h3>
    </a>
</div>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="width: 25rem;">
        <div class="card-body">
            <h5 class="card-title text-center mb-4">S'inscrire</h5>
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Nom :</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
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
                <div class="form-group">
                    <label for="password_confirmation">Confirmer le mot de passe :</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
                <div class="form-group">
                    <label for="phone">Téléphone :</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="photo_profil">Photo de profil :</label>
                    <input type="file" class="form-control-file @error('photo_profil') is-invalid @enderror" id="photo_profil" name="photo_profil">
                    @error('photo_profil')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="photo_recto_carte_identite">Photo recto carte d'identité :</label>
                    <input type="file" class="form-control-file @error('photo_recto_carte_identite') is-invalid @enderror" id="photo_recto_carte_identite" name="photo_recto_carte_identite">
                    @error('photo_recto_carte_identite')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="photo_verso_carte_identite">Photo verso carte d'identité :</label>
                    <input type="file" class="form-control-file @error('photo_verso_carte_identite') is-invalid @enderror" id="photo_verso_carte_identite" name="photo_verso_carte_identite">
                    @error('photo_verso_carte_identite')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">S'inscrire</button>
            </form>
            <hr>
            <div class="text-center">
                <p>Vous avez déjà un compte ? <a href="{{ route('login') }}">Se connecter</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
