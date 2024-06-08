@extends('admin.layouts1.app')

@section('title', 'Gestion des annonces')

@section('contents')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0">Liste des annonces</h1>
        <a href="{{ route('gestion-annonces.create') }}" class="btn btn-primary">Créer une annonce</a>
    </div>
    <hr />
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>État</th>
                        <th>Description</th>
                        <th>Type</th>
                        <th>Prix</th>
                        <th>Approuvé</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($annonces as $annonce)
                        <tr>
                            <td>{{ $annonce->titre }}</td>
                            <td>{{ $annonce->etat }}</td>
                            <td>{{ $annonce->description }}</td>
                            <td>{{ $annonce->type }}</td>
                            <td>{{ $annonce->prix }}</td>
                            <td>{{ $annonce->is_approved ? 'Oui' : 'Non' }}</td>
                            <td>
                                <a href="{{ route('gestion-annonces.show', $annonce->id) }}" class="btn btn-info">Voir</a>
                                <a href="{{ route('gestion-annonces.edit', $annonce->id) }}" class="btn btn-warning">Modifier</a>
                                <form action="{{ route('gestion-annonces.destroy', $annonce->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                                @if(!$annonce->is_approved)
                                    <form action="{{ route('gestion-annonces.approve', $annonce->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Approuver</button>
                                    </form>
                                @else
                                    <form action="{{ route('gestion-annonces.disapprove', $annonce->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-secondary">Désapprouver</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
