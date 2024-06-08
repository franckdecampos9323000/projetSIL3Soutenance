@extends('user.layouts1.app')

@section('title', 'Profil de l\'utilisateur')

@section('contents')
    <h1>Profil de l'utilisateur</h1>
    <p>Nom : {{ $user->name }}</p>
    <p>Email : {{ $user->email }}</p>
    <p>Téléphone : {{ $user->phone }}</p>
    @if ($user->photo_profil)
        <p><img src="{{ asset('storage/' . $user->photo_profil) }}" alt="Photo de profil" class="img-thumbnail" width="100"></p>
    @endif
    <a href="{{ route('user.profile.edit') }}" class="btn btn-primary">Modifier le profil</a>
@endsection
