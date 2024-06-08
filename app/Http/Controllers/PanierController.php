<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panier;

class PanierController extends Controller
{
    // Afficher le contenu du panier
    public function index()
    {
        // Récupérer les éléments du panier pour l'utilisateur authentifié
        $panierItems = auth()->user()->paniers()->with('annonce')->get();

        // Calculer le montant total
        $total = $this->calculateTotal();

        return view('pages.panier', compact('panierItems', 'total'));
    }
    // Ajouter un article au panier
    public function store(Request $request)
    {
        // Validation des données de la requête
        $request->validate([
            'annonce_id' => 'required|exists:annonces,id',
            'quantite' => 'required|integer|min:1',
        ]);

        // Créer une nouvelle entrée dans le panier pour l'utilisateur authentifié
        auth()->user()->paniers()->create([
            'annonce_id' => $request->annonce_id,
            'quantite' => $request->quantite,
            // Ajoutez d'autres champs si nécessaire
        ]);

        return redirect()->route('panier.index')->with('success', 'Annonce ajoutée au panier avec succès.');
    }

    // Supprimer un article du panier
    public function destroy($id)
    {
        // Recherche de l'élément du panier à supprimer
        $panierItem = Panier::findOrFail($id);

        // Vérification que l'utilisateur authentifié possède cet élément dans son panier
        if ($panierItem->user_id === auth()->id()) {
            // Suppression de l'élément du panier
            $panierItem->delete();
            return redirect()->route('panier.index')->with('success', 'Article supprimé du panier avec succès.');
        }

        return redirect()->route('panier.index')->with('error', 'Vous n\'êtes pas autorisé à supprimer cet article du panier.');
    }

    // Actualiser les quantités des articles dans le panier
    public function update(Request $request, $id)
    {
        // Validation des données de la requête
        $request->validate([
            'quantite' => 'required|integer|min:1',
        ]);

        // Recherche de l'élément du panier à mettre à jour
        $panierItem = Panier::findOrFail($id);

        // Vérification que l'utilisateur authentifié possède cet élément dans son panier
        if ($panierItem->user_id === auth()->id()) {
            // Mise à jour de la quantité de l'article dans le panier
            $panierItem->update([
                'quantite' => $request->quantite,
            ]);
            return redirect()->route('panier.index')->with('success', 'Quantité de l\'article mise à jour avec succès.');
        }

        return redirect()->route('panier.index')->with('error', 'Vous n\'êtes pas autorisé à mettre à jour la quantité de cet article dans le panier.');
    }

    private function calculateTotal()
    {
        $total = 0;
        $panierItems = auth()->user()->paniers()->with('annonce')->get();

        foreach ($panierItems as $panierItem) {
            $total += $panierItem->annonce->prix * $panierItem->quantite;
        }

        return $total;
    }
}
