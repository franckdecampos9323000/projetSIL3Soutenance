<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminProfileController extends Controller
{
    // Afficher le profil de l'administrateur
    public function show()
    {
        $admin = Auth::user();
        return view('admin.profile.show', compact('admin'));
    }

    // Afficher le formulaire de modification du profil
    public function edit()
    {
        $admin = Auth::user();
        return view('admin.profile.edit', compact('admin'));
    }

    // Mettre à jour le profil de l'administrateur
    public function update(Request $request)
    {
        $admin = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $admin->id,
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
            $admin->photo_profil = $photo_profil_path;
        }

        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }
        $admin->phone = $request->phone;

        $admin->save();

        return redirect()->route('admin.profile.show')->with('success', 'Profil mis à jour avec succès.');
    }
}
