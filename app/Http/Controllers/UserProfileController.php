<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{
    // Afficher le profil de l'utilisateur
    public function show()
    {
        $user = Auth::user();
        return view('user.profile.show', compact('user'));
    }

    // Afficher le formulaire de modification du profil
    public function edit()
    {
        $user = Auth::user();
        return view('user.profile.edit', compact('user'));
    }

    // Mettre à jour le profil de l'utilisateur
    public function update(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
            'photo_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Gestion des fichiers d'image
        if ($request->file('photo_profil')) {
            $photo_profil_path = $request->file('photo_profil')->store('photos_profil', 'public');
            $user->photo_profil = $photo_profil_path;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->phone = $request->phone;

        $user->save();

        return redirect()->route('user.profile.show')->with('success', 'Profil mis à jour avec succès.');
    }
}
