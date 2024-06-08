@extends('admin.layouts1.app')

@section('title', "Détails de l'utilisateur")

@section('contents')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0">Détails de l'utilisateur</h1>
        <a href="{{ route('gestion-utilisateurs.index') }}" class="btn btn-secondary">Retour</a>
    </div>
    <hr />
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nom: {{ $user->name }}</h5>
            <p class="card-text">Email: {{ $user->email }}</p>
            <p class="card-text">Téléphone: {{ $user->phone }}</p>
            @if ($user->photo_profil)
                <p class="card-text">Photo de profil: <img src="{{ asset('storage/' . $user->photo_profil) }}" alt="Photo de profil" class="img-thumbnail" width="100"></p>
            @else
                <p class="card-text">Photo de profil: N/A</p>
            @endif
            @if ($user->photo_recto_carte_identite)
                <p class="card-text">Photo recto carte d'identité: <img src="{{ asset('storage/' . $user->photo_recto_carte_identite) }}" alt="Photo recto carte d'identité" class="img-thumbnail" width="100"></p>
            @else
                <p class="card-text">Photo recto carte d'identité: N/A</p>
            @endif
            @if ($user->photo_verso_carte_identite)
                <p class="card-text">Photo verso carte d'identité: <img src="{{ asset('storage/' . $user->photo_verso_carte_identite) }}" alt="Photo verso carte d'identité" class="img-thumbnail" width="100"></p>
            @else
                <p class="card-text">Photo verso carte d'identité: N/A</p>
            @endif
            <p class="card-text">Statut: {{ $user->is_approved ? 'Approuvé' : 'Non approuvé' }}</p>
            <div class="d-flex">
                @if (!$user->is_approved)
                    <form action="{{ route('gestion-utilisateurs.approve', $user->id) }}" method="POST" style="display:inline-block; margin-right: 10px;">
                        @csrf
                        <button type="submit" class="btn btn-success">Approuver</button>
                    </form>
                @else
                    <form action="{{ route('gestion-utilisateurs.disapprove', $user->id) }}" method="POST" style="display:inline-block; margin-right: 10px;">
                        @csrf
                        <button type="submit" class="btn btn-secondary">Désapprouver</button>
                    </form>
                @endif
                <a href="{{ route('gestion-utilisateurs.edit', $user->id) }}" class="btn btn-warning" style="margin-right: 10px;">Modifier</a>
                <form action="{{ route('gestion-utilisateurs.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
