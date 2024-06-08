@extends('user.layouts1.app')

@section('title', 'Détails de l\'annonce')

@section('contents')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>{{ $annonce->titre }}</h2>
                <p>État: {{ $annonce->etat }}</p>
                <p>Description: {{ $annonce->description }}</p>
                <p>Type: {{ $annonce->type }}</p>
                <p>Prix: {{ $annonce->prix }}</p>
                <p>Images:</p>
                @if ($annonce->image1)
                    <img src="{{ asset('storage/' . $annonce->image1) }}" alt="Image 1" class="img-thumbnail" width="150">
                @endif
                @if ($annonce->image2)
                    <img src="{{ asset('storage/' . $annonce->image2) }}" alt="Image 2" class="img-thumbnail" width="150">
                @endif
                @if ($annonce->image3)
                    <img src="{{ asset('storage/' . $annonce->image3) }}" alt="Image 3" class="img-thumbnail" width="150">
                @endif
                <p>Approuvé: {{ $annonce->is_approved ? 'Oui' : 'Non' }}</p>
                <a href="{{ route('user-annonces.edit', $annonce->id) }}" class="btn btn-warning">Modifier</a>
                <form action="{{ route('user-annonces.destroy', $annonce->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
