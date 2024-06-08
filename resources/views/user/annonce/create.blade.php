@extends('user.layouts1.app')

@section('title', 'Créer une annonce')

@section('contents')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Créer une Annonce</h2>
                <form action="{{ route('user-annonces.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" class="form-control" id="titre" name="titre" required>
                    </div>
                    <div class="form-group">
                        <label for="etat">État</label>
                        <input type="text" class="form-control" id="etat" name="etat" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <input type="text" class="form-control" id="type" name="type" required>
                    </div>
                    <div class="form-group">
                        <label for="prix">Prix</label>
                        <input type="number" class="form-control" id="prix" name="prix" required>
                    </div>
                    <div class="form-group">
                        <label for="image1">Image 1</label>
                        <input type="file" class="form-control" id="image1" name="image1">
                    </div>
                    <div class="form-group">
                        <label for="image2">Image 2</label>
                        <input type="file" class="form-control" id="image2" name="image2">
                    </div>
                    <div class="form-group">
                        <label for="image3">Image 3</label>
                        <input type="file" class="form-control" id="image3" name="image3">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Créer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
