@extends('admin.layouts1.app')

@section('title', 'Dashboard - Vous êtes connecté en tant que Admin')

@section('contents')
    <div class="row ml-1">

        <div class="col-md-4 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Annonces</h5>
                    <p class="card-text"></p>
                    <i class="fas fa-user"></i>
                </div>
            </div>
        </div>


        <div class="col-md-4 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Utilisateurs</h5>
                    <p class="card-text"></p>
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>
    </div>
@endsection
