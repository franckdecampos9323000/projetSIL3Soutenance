@extends('admin.layouts1.app')

@section('title', 'Profil de l\'administrateur')

@section('contents')
    <h1>Profil de l'administrateur</h1>
    <p>Nom : {{ $admin->name }}</p>
    <p>Email : {{ $admin->email }}</p>
    <p>Téléphone : {{ $admin->phone }}</p>
    @if ($admin->photo_profil)
        <p><img src="{{ asset('storage/' . $admin->photo_profil) }}" alt="Photo de profil" class="img-thumbnail" width="100"></p>
    @endif
    <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary">Modifier le profil</a>
@endsection
