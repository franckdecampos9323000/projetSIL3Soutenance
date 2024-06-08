@extends('user.layouts1.app')

@section('title', 'Gestion des annonces')

@section('contents')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0">Liste des annonces</h1>
        <a href="{{ route('user-annonces.create') }}" class="btn btn-primary">Créer une annonce</a>
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
                        <th>Images</th>
                        <th>Approuvé</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($annonces && count($annonces) > 0)
                        @foreach($annonces as $annonce)
                            <tr>
                                <td>{{ $annonce->titre }}</td>
                                <td>{{ $annonce->etat }}</td>
                                <td>{{ $annonce->description }}</td>
                                <td>{{ $annonce->type }}</td>
                                <td>{{ $annonce->prix }}</td>
                                <td>
                                    @if ($annonce->image1)
                                        <img src="{{ asset('storage/' . $annonce->image1) }}" alt="Image 1" class="img-thumbnail" width="50">
                                    @endif
                                    @if ($annonce->image2)
                                        <img src="{{ asset('storage/' . $annonce->image2) }}" alt="Image 2" class="img-thumbnail" width="50">
                                    @endif
                                    @if ($annonce->image3)
                                        <img src="{{ asset('storage/' . $annonce->image3) }}" alt="Image 3" class="img-thumbnail" width="50">
                                    @endif
                                </td>
                                <td>{{ $annonce->is_approved ? 'Oui' : 'Non' }}</td>
                                <td>
                                    <a href="{{ route('user-annonces.show', $annonce->id) }}" class="btn btn-info">Voir</a>
                                    <a href="{{ route('user-annonces.edit', $annonce->id) }}" class="btn btn-warning">Modifier</a>
                                    <form action="{{ route('user-annonces.destroy', $annonce->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="text-center">Aucune annonce trouvée.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
