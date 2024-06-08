@extends('admin.layouts1.app')

@section('title', 'Modifier un Utilisateur')

@section('contents')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0">Modifier un Utilisateur</h1>
        <a href="{{ route('gestion-utilisateurs.index') }}" class="btn btn-secondary">Retour</a>
    </div>
    <hr />
    <div class="card">
        <div class="card-body">
            <form action="{{ route('gestion-utilisateurs.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                </div>
                <div class="form-group">
                    <label for="phone">Téléphone</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}">
                </div>
                <div class="form-group">
                    <label for="photo_profil">Photo de profil</label>
                    <input type="file" name="photo_profil" id="photo_profil" class="form-control-file">
                    @if ($user->photo_profil)
                        <img src="{{ asset('storage/' . $user->photo_profil) }}" alt="Photo de profil" class="img-thumbnail mt-2" width="150">
                    @endif
                </div>
                <div class="form-group">
                    <label for="photo_recto_carte_identite">Photo recto carte d'identité</label>
                    <input type="file" name="photo_recto_carte_identite" id="photo_recto_carte_identite" class="form-control-file">
                    @if ($user->photo_recto_carte_identite)
                        <img src="{{ asset('storage/' . $user->photo_recto_carte_identite) }}" alt="Photo recto carte d'identité" class="img-thumbnail mt-2" width="150">
                    @endif
                </div>
                <div class="form-group">
                    <label for="photo_verso_carte_identite">Photo verso carte d'identité</label>
                    <input type="file" name="photo_verso_carte_identite" id="photo_verso_carte_identite" class="form-control-file">
                    @if ($user->photo_verso_carte_identite)
                        <img src="{{ asset('storage/' . $user->photo_verso_carte_identite) }}" alt="Photo verso carte d'identité" class="img-thumbnail mt-2" width="150">
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Modifier l'utilisateur</button>
            </form>
        </div>
    </div>
@endsection
