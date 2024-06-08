<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use Illuminate\Contracts\View\View;

class AnnoncesController extends Controller
{
    // Afficher toutes les annonces approuvées
    public function index(Request $request): View
    {
        // Récupérer le terme de recherche depuis la requête
        $searchTerm = $request->input('search');

        // Requête pour récupérer les annonces approuvées
        $query = Annonce::where('is_approved', true);

        // Si un terme de recherche est spécifié, appliquer la recherche
        if ($searchTerm) {
            $query->where('titre', 'like', '%' . $searchTerm . '%');
        }

        // Exécuter la requête
        $annonces = $query->get();

        // Retourner la vue avec les annonces filtrées
        return view("pages.annonces", ['annonces' => $annonces]);
    }

    // Afficher les détails d'une annonce approuvée
    public function show(int $id): View
    {
        $annonce = Annonce::where('is_approved', true)->findOrFail($id);
        return view("pages.details_annonce", ['annonce' => $annonce]);
    }
}
