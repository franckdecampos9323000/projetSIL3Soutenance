<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
            'photo_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo_recto_carte_identite' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo_verso_carte_identite' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Gestion des fichiers d'image
        $photo_profil_path = $request->file('photo_profil') ? $request->file('photo_profil')->store('photos_profil', 'public') : null;
        $photo_recto_carte_identite_path = $request->file('photo_recto_carte_identite') ? $request->file('photo_recto_carte_identite')->store('photos_cartes_identite', 'public') : null;
        $photo_verso_carte_identite_path = $request->file('photo_verso_carte_identite') ? $request->file('photo_verso_carte_identite')->store('photos_cartes_identite', 'public') : null;

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Par défaut, les nouveaux utilisateurs ont le rôle 'user'
            'phone' => $request->phone,
            'photo_profil' => $photo_profil_path,
            'photo_recto_carte_identite' => $photo_recto_carte_identite_path,
            'photo_verso_carte_identite' => $photo_verso_carte_identite_path,
        ]);

        return redirect('/login')->with('status', 'Enregistrement réussi. Attendez l\'approbation de l\'administrateur.');
    }
}
