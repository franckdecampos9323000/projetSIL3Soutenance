@extends('admin.layouts1.app')

@section('title', 'Créer un Utilisateur')

@section('contents')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0">Créer un Utilisateur</h1>
        <a href="{{ route('gestion-utilisateurs.index') }}" class="btn btn-secondary">Retour</a>
    </div>
    <hr />
    <div class="card">
        <div class="card-body">
            <form action="{{ route('gestion-utilisateurs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Entrez le nom de l'utilisateur" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Entrez l'email de l'utilisateur" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Entrez le mot de passe de l'utilisateur" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirmez le mot de passe</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirmez le mot de passe" required>
                </div>
                <div class="form-group">
                    <label for="phone">Téléphone</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Entrez le téléphone de l'utilisateur">
                </div>
                <div class="form-group">
                    <label for="photo_profil">Photo de profil</label>
                    <input type="file" name="photo_profil" id="photo_profil" class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="photo_recto_carte_identite">Photo recto carte d'identité</label>
                    <input type="file" name="photo_recto_carte_identite" id="photo_recto_carte_identite" class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="photo_verso_carte_identite">Photo verso carte d'identité</label>
                    <input type="file" name="photo_verso_carte_identite" id="photo_verso_carte_identite" class="form-control-file">
                </div>
                <button type="submit" class="btn btn-primary">Créer l'utilisateur</button>
            </form>
        </div>
    </div>
@endsection
