@extends('admin.layouts1.app')

@section('title', "Détails de l'annonce")

@section('contents')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0">Détails de l'annonce</h1>
        <a href="{{ route('gestion-annonces.index') }}" class="btn btn-secondary">Retour</a>
    </div>
    <hr />
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Titre: {{ $annonce->titre }}</h5>
            <p class="card-text">État: {{ $annonce->etat }}</p>
            <p class="card-text">Description: {{ $annonce->description }}</p>
            <p class="card-text">Type: {{ $annonce->type }}</p>
            <p class="card-text">Prix: {{ $annonce->prix }}</p>
            @if ($annonce->image1)
                <p class="card-text">Image 1: <img src="{{ asset('storage/' . $annonce->image1) }}" alt="Image 1" class="img-thumbnail" width="100"></p>
            @else
                <p class="card-text">Image 1: N/A</p>
            @endif
            @if ($annonce->image2)
                <p class="card-text">Image 2: <img src="{{ asset('storage/' . $annonce->image2) }}" alt="Image 2" class="img-thumbnail" width="100"></p>
            @else
                <p class="card-text">Image 2: N/A</p>
            @endif
            @if ($annonce->image3)
                <p class="card-text">Image 3: <img src="{{ asset('storage/' . $annonce->image3) }}" alt="Image 3" class="img-thumbnail" width="100"></p>
            @else
                <p class="card-text">Image 3: N/A</p>
            @endif
            <p class="card-text">Statut: {{ $annonce->is_approved ? 'Approuvée' : 'Non approuvée' }}</p>
            <div class="d-flex">
                @if (!$annonce->is_approved)
                    <form action="{{ route('gestion-annonces.approve', $annonce->id) }}" method="POST" style="display:inline-block; margin-right: 10px;">
                        @csrf
                        <button type="submit" class="btn btn-success">Approuver</button>
                    </form>
                @else
                    <form action="{{ route('gestion-annonces.disapprove', $annonce->id) }}" method="POST" style="display:inline-block; margin-right: 10px;">
                        @csrf
                        <button type="submit" class="btn btn-secondary">Désapprouver</button>
                    </form>
                @endif
                <a href="{{ route('gestion-annonces.edit', $annonce->id) }}" class="btn btn-warning" style="margin-right: 10px;">Modifier</a>
                <form action="{{ route('gestion-annonces.destroy', $annonce->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
