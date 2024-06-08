<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Annonce;

class GestionAnnonceUtilisateurController extends Controller
{
    // Afficher le formulaire de création d'une annonce
    public function create()
    {
        return view('user.annonce.create');
    }

    // Enregistrer une nouvelle annonce
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'titre' => 'required|string|max:255',
            'etat' => 'required|string',
            'description' => 'required|string',
            'type' => 'required|string',
            'prix' => 'required|numeric',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Ajouter d'autres validations si nécessaire
        ]);

        // Gestion des fichiers d'image
        $image1_path = $request->file('image1') ? $request->file('image1')->store('images', 'public') : null;
        $image2_path = $request->file('image2') ? $request->file('image2')->store('images', 'public') : null;
        $image3_path = $request->file('image3') ? $request->file('image3')->store('images', 'public') : null;

        // Création de l'annonce
        $annonce = new Annonce([
            'titre' => $request->titre,
            'etat' => $request->etat,
            'description' => $request->description,
            'type' => $request->type,
            'prix' => $request->prix,
            'image1' => $image1_path,
            'image2' => $image2_path,
            'image3' => $image3_path,
            'is_approved' => false, // L'annonce est non approuvée par défaut
            'user_id' => Auth::id(),
        ]);

        $annonce->save();

        return redirect()->route('user-annonces.index')->with('success', 'Votre annonce a été créée avec succès.');
    }

    // Afficher les annonces de l'utilisateur connecté
    public function index()
    {
        $annonces = Auth::user()->annonces;
        return view('user.annonce.index', ['annonces' => $annonces]);
    }

    // Afficher les détails d'une annonce
    public function show($id)
    {
        $annonce = Annonce::findOrFail($id);
        // Vérifier si l'utilisateur connecté est le propriétaire de l'annonce
        if ($annonce->user_id !== Auth::user()->id) {
            return redirect()->route('user-annonces.index')->with('error', 'Vous n\'avez pas le droit d\'accéder à cette annonce.');
        }
        return view('user.annonce.show', ['annonce' => $annonce]);
    }

    // Afficher le formulaire de modification d'une annonce
    public function edit($id)
    {
        $annonce = Annonce::findOrFail($id);
        // Vérifier si l'utilisateur connecté est le propriétaire de l'annonce
        if ($annonce->user_id !== Auth::user()->id) {
            return redirect()->route('user-annonces.index')->with('error', 'Vous n\'avez pas le droit de modifier cette annonce.');
        }
        return view('user.annonce.edit', ['annonce' => $annonce]);
    }

    // Mettre à jour les informations d'une annonce
    public function update(Request $request, $id)
    {
        $annonce = Annonce::findOrFail($id);
        // Vérifier si l'utilisateur connecté est le propriétaire de l'annonce
        if ($annonce->user_id !== Auth::user()->id) {
            return redirect()->route('user-annonces.index')->with('error', 'Vous n\'avez pas le droit de modifier cette annonce.');
        }

        // Validation des données
        $request->validate([
            'titre' => 'required|string|max:255',
            'etat' => 'required|string',
            'description' => 'required|string',
            'type' => 'required|string',
            'prix' => 'required|numeric',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Ajouter d'autres validations si nécessaire
        ]);

        // Gestion des fichiers d'image
        if ($request->hasFile('image1')) {
            $image1_path = $request->file('image1')->store('images', 'public');
            $annonce->image1 = $image1_path;
        }
        if ($request->hasFile('image2')) {
            $image2_path = $request->file('image2')->store('images', 'public');
            $annonce->image2 = $image2_path;
        }
        if ($request->hasFile('image3')) {
            $image3_path = $request->file('image3')->store('images', 'public');
            $annonce->image3 = $image3_path;
        }

        // Mise à jour de l'annonce
        $annonce->titre = $request->titre;
        $annonce->etat = $request->etat;
        $annonce->description = $request->description;
        $annonce->type = $request->type;
        $annonce->prix = $request->prix;
        $annonce->save();

        return redirect()->route('user-annonces.index')->with('success', 'Votre annonce a été mise à jour avec succès.');
    }

    // Supprimer une annonce
    public function destroy($id)
    {
        $annonce = Annonce::findOrFail($id);
        // Vérifier si l'utilisateur connecté est le propriétaire de l'annonce
        if ($annonce->user_id !== Auth::user()->id) {
            return redirect()->route('user-annonces.index')->with('error', 'Vous n\'avez pas le droit de supprimer cette annonce.');
        }
        $annonce->delete();

        return redirect()->route('user-annonces.index')->with('success', 'Votre annonce a été supprimée avec succès.');
    }
}
