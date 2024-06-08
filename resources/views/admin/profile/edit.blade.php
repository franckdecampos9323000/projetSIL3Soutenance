@extends('admin.layouts1.app')

@section('title', 'Modifier le profil de l\'administrateur')

@section('contents')
    <h1>Modifier le profil</h1>
    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $admin->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $admin->email }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Téléphone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $admin->phone }}">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control">
            <small>Laissez vide si vous ne souhaitez pas changer le mot de passe</small>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirmer le mot de passe</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>
        <div class="form-group">
            <label for="photo_profil">Photo de profil</label>
            <input type="file" name="photo_profil" id="photo_profil" class="form-control-file">
            @if ($admin->photo_profil)
                <p><img src="{{ asset('storage/' . $admin->photo_profil) }}" alt="Photo de profil" class="img-thumbnail" width="100"></p>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
    </form>
@endsection
