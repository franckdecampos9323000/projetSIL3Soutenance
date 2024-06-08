@extends('admin.layouts1.app')

@section('title', 'Liste des Utilisateurs')

@section('contents')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0">Liste des Utilisateurs</h1>
        <a href="{{ route('gestion-utilisateurs.create') }}" class="btn btn-primary">Ajouter un Utilisateur</a>
    </div>
    <hr />
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Photo de profil</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            @if ($user->photo_profil)
                                <img src="{{ asset('storage/' . $user->photo_profil) }}" alt="Photo de profil" class="img-thumbnail" width="50">
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $user->is_approved ? 'Approuvé' : 'Non approuvé' }}</td>
                        <td>
                            <a href="{{ route('gestion-utilisateurs.show', $user->id) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('gestion-utilisateurs.edit', $user->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                            <form action="{{ route('gestion-utilisateurs.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                            @if (!$user->is_approved)
                                <form action="{{ route('gestion-utilisateurs.approve', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success btn-sm">Approuver</button>
                                </form>
                            @else
                                <form action="{{ route('gestion-utilisateurs.disapprove', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-secondary btn-sm">Désapprouver</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
