<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GestionUtilisateurController extends Controller
{
    // Afficher tous les utilisateurs
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', ['users' => $users]);
    }

    // Afficher le formulaire de création d'un utilisateur
    public function create()
    {
        return view('admin.user.create');
    }

    // Enregistrer un nouvel utilisateur
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
            'photo_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo_recto_carte_identite' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo_verso_carte_identite' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Gestion des fichiers d'image
        $photo_profil_path = $request->file('photo_profil') ? $request->file('photo_profil')->store('photos_profil', 'public') : null;
        $photo_recto_carte_identite_path = $request->file('photo_recto_carte_identite') ? $request->file('photo_recto_carte_identite')->store('photos_cartes_identite', 'public') : null;
        $photo_verso_carte_identite_path = $request->file('photo_verso_carte_identite') ? $request->file('photo_verso_carte_identite')->store('photos_cartes_identite', 'public') : null;

        // Enregistrement de l'utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_approved' => true, // L'utilisateur est approuvé par défaut
            'phone' => $request->phone,
            'photo_profil' => $photo_profil_path,
            'photo_recto_carte_identite' => $photo_recto_carte_identite_path,
            'photo_verso_carte_identite' => $photo_verso_carte_identite_path,
        ]);

        // Redirection avec un message de succès
        return redirect()->route('gestion-utilisateurs.index')->with('success', 'Utilisateur créé avec succès.');
    }

    // Afficher les détails d'un utilisateur
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.show', ['user' => $user]);
    }

    // Afficher le formulaire de modification d'un utilisateur
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', ['user' => $user]);
    }

    // Mettre à jour les informations d'un utilisateur
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
            'photo_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo_recto_carte_identite' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo_verso_carte_identite' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Gestion des fichiers d'image
        $user = User::findOrFail($id);

        if ($request->hasFile('photo_profil')) {
            $photo_profil_path = $request->file('photo_profil')->store('photos_profil', 'public');
            $user->photo_profil = $photo_profil_path;
        }

        if ($request->hasFile('photo_recto_carte_identite')) {
            $photo_recto_carte_identite_path = $request->file('photo_recto_carte_identite')->store('photos_cartes_identite', 'public');
            $user->photo_recto_carte_identite = $photo_recto_carte_identite_path;
        }

        if ($request->hasFile('photo_verso_carte_identite')) {
            $photo_verso_carte_identite_path = $request->file('photo_verso_carte_identite')->store('photos_cartes_identite', 'public');
            $user->photo_verso_carte_identite = $photo_verso_carte_identite_path;
        }

        // Mise à jour de l'utilisateur
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->phone = $request->phone;
        $user->save();

        // Redirection avec un message de succès
        return redirect()->route('gestion-utilisateurs.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    // Approuver un utilisateur
    public function approve($id)
    {
        $user = User::findOrFail($id);
        $user->is_approved = true;
        $user->save();

        return redirect()->route('gestion-utilisateurs.index')->with('success', 'Utilisateur approuvé avec succès.');
    }

    // Désapprouver un utilisateur
    public function disapprove($id)
    {
        $user = User::findOrFail($id);
        $user->is_approved = false;
        $user->save();

        return redirect()->route('gestion-utilisateurs.index')->with('success', 'Utilisateur désapprouvé avec succès.');
    }

    // Supprimer un utilisateur
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('gestion-utilisateurs.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
