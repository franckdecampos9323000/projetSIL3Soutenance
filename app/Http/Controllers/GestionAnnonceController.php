<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use Illuminate\Support\Facades\Storage;

class GestionAnnonceController extends Controller
{
    // Afficher la liste des annonces
    public function index()
    {
        $annonces = Annonce::all(); // Afficher toutes les annonces, approuvées ou non
        return view('admin.annonce.index', ['annonces' => $annonces]);
    }

    // Approbation d'une annonce
    public function approve($id)
    {
        $annonce = Annonce::findOrFail($id);
        $annonce->is_approved = true;
        $annonce->save();

        return redirect()->route('gestion-annonces.index')->with('success', 'Annonce approuvée avec succès.');
    }

    // Désapprobation d'une annonce
    public function disapprove($id)
    {
        $annonce = Annonce::findOrFail($id);
        $annonce->is_approved = false;
        $annonce->save();

        return redirect()->route('gestion-annonces.index')->with('success', 'Annonce désapprouvée avec succès.');
    }

    // Afficher le formulaire de création d'une annonce
    public function create()
    {
        return view('admin.annonce.create');
    }

    // Enregistrer une nouvelle annonce
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string',
            'etat' => 'required|string',
            'description' => 'required|string',
            'type' => 'required|string',
            'prix' => 'required|numeric',
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $annonce = new Annonce();
        $annonce->fill($request->except(['image1', 'image2', 'image3']));
        $annonce->user_id = auth()->user()->id; // Récupère l'ID de l'utilisateur actuellement authentifié
        $annonce->is_approved = true; // Marquer l'annonce comme approuvée par défaut

        // Enregistrer les images
        if ($request->hasFile('image1')) {
            $annonce->image1 = $request->file('image1')->store('annonces', 'public');
        }
        if ($request->hasFile('image2')) {
            $annonce->image2 = $request->file('image2')->store('annonces', 'public');
        }
        if ($request->hasFile('image3')) {
            $annonce->image3 = $request->file('image3')->store('annonces', 'public');
        }

        $annonce->save();

        return redirect()->route('gestion-annonces.index')->with('success', 'Annonce créée avec succès.');
    }

    // Afficher les détails d'une annonce
    public function show($id)
    {
        $annonce = Annonce::findOrFail($id);
        return view('admin.annonce.show', ['annonce' => $annonce]);
    }

    // Afficher le formulaire de modification d'une annonce
    public function edit($id)
    {
        $annonce = Annonce::findOrFail($id);
        return view('admin.annonce.edit', ['annonce' => $annonce]);
    }

    // Mettre à jour les informations d'une annonce
    public function update(Request $request, $id)
    {
        $annonce = Annonce::findOrFail($id);

        $request->validate([
            'titre' => 'required|string',
            'etat' => 'required|string',
            'description' => 'required|string',
            'type' => 'required|string',
            'prix' => 'required|numeric',
            'image1' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $annonce->fill($request->except(['image1', 'image2', 'image3']));

        // Mettre à jour les images
        if ($request->hasFile('image1')) {
            Storage::delete('public/' . $annonce->image1);
            $annonce->image1 = $request->file('image1')->store('annonces', 'public');
        }
        if ($request->hasFile('image2')) {
            Storage::delete('public/' . $annonce->image2);
            $annonce->image2 = $request->file('image2')->store('annonces', 'public');
        }
        if ($request->hasFile('image3')) {
            Storage::delete('public/' . $annonce->image3);
            $annonce->image3 = $request->file('image3')->store('annonces', 'public');
        }

        $annonce->save();

        return redirect()->route('gestion-annonces.index')->with('success', 'Annonce mise à jour avec succès.');
    }

    // Supprimer une annonce
    public function destroy($id)
    {
        $annonce = Annonce::findOrFail($id);

        // Supprimer les images
        Storage::delete('public/' . $annonce->image1);
        Storage::delete('public/' . $annonce->image2);
        Storage::delete('public/' . $annonce->image3);

        $annonce->delete();

        return redirect()->route('gestion-annonces.index')->with('success', 'Annonce supprimée avec succès.');
    }
}
