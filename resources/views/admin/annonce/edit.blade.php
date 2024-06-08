@extends('admin.layouts1.app')

@section('title', 'Modifier une annonce')

@section('contents')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0">Modifier l'annonce</h1>
        <a href="{{ route('gestion-annonces.index') }}" class="btn btn-secondary">Retour</a>
    </div>
    <hr />
    <div class="card">
        <div class="card-body">
            <form action="{{ route('gestion-annonces.update', $annonce->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" name="titre" id="titre" class="form-control" value="{{ $annonce->titre }}" required>
                </div>
                <div class="form-group">
                    <label for="etat">État</label>
                    <input type="text" name="etat" id="etat" class="form-control" value="{{ $annonce->etat }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" required>{{ $annonce->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" name="type" id="type" class="form-control" value="{{ $annonce->type }}" required>
                </div>
                <div class="form-group">
                    <label for="prix">Prix</label>
                    <input type="number" name="prix" id="prix" class="form-control" value="{{ $annonce->prix }}" required>
                </div>
                <div class="form-group">
                    <label for="image1">Image 1</label>
                    <input type="file" name="image1" id="image1" class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="image2">Image 2</label>
                    <input type="file" name="image2" id="image2" class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="image3">Image 3</label>
                    <input type="file" name="image3" id="image3" class="form-control-file">
                </div>
                <button type="submit" class="btn btn-primary">Mettre à jour l'annonce</button>
            </form>
        </div>
    </div>
@endsection
