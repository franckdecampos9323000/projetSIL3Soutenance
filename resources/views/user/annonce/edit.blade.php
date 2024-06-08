@extends('user.layouts1.app')

@section('title', 'Modifier l\'annonce')

@section('contents')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Modifier l'Annonce</h2>
                <form action="{{ route('user-annonces.update', $annonce->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" class="form-control" id="titre" name="titre" value="{{ $annonce->titre }}" required>
                    </div>
                    <div class="form-group">
                        <label for="etat">État</label>
                        <input type="text" class="form-control" id="etat" name="etat" value="{{ $annonce->etat }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" required>{{ $annonce->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <input type="text" class="form-control" id="type" name="type" value="{{ $annonce->type }}" required>
                    </div>
                    <div class="form-group">
                        <label for="prix">Prix</label>
                        <input type="number" class="form-control" id="prix" name="prix" value="{{ $annonce->prix }}" required>
                    </div>
                    <div class="form-group">
                        <label for="image1">Image 1</label>
                        <input type="file" class="form-control" id="image1" name="image1">
                        @if ($annonce->image1)
                            <img src="{{ asset('storage/' . $annonce->image1) }}" alt="Image 1" class="img-thumbnail" width="150">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="image2">Image 2</label>
                        <input type="file" class="form-control" id="image2" name="image2">
                        @if ($annonce->image2)
                            <img src="{{ asset('storage/' . $annonce->image2) }}" alt="Image 2" class="img-thumbnail" width="150">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="image3">Image 3</label>
                        <input type="file" class="form-control" id="image3" name="image3">
                        @if ($annonce->image3)
                            <img src="{{ asset('storage/' . $annonce->image3) }}" alt="Image 3" class="img-thumbnail" width="150">
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
