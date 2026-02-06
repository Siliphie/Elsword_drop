<?php

namespace App\Http\Controllers;

use App\Models\ItemDropRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ItemDropRateController extends Controller
{
    public function create()
    {
        return view('drops.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string',
            'run_attempt' => 'required|integer',
            'drop_rate_ratio' => 'required|integer',
        ]);

        ItemDropRate::create([
            'user_id' => auth()->id(),
            'item_name' => $request->item_name,
            'run_attempt' => $request->run_attempt,
            'drop_rate_ratio' => $request->drop_rate_ratio,
        ]);

        return redirect()->route('drops.index')->with('success', 'Item ajouté avec succès !');
    }
    
    public function index()
    {
        // On récupère uniquement les drops de l'utilisateur connecté
        $drops = auth()->user()->itemDropRates;
        return view('drops.index', compact('drops')); 
    }

    public function adminIndex()
    {
        if (!Gate::allows('access-admin')) {
            abort(403); 
        }

        // On récupère TOUS les drops de TOUS les utilisateurs
        $allDrops = ItemDropRate::with('user')->get(); 

        return view('admin.drops.index', compact('allDrops'));
    }

    public function destroy($id)
    {
        // On cherche le drop dans toute la table
        $drop = ItemDropRate::findOrFail($id);

        // SÉCURITÉ : On autorise si c'est le propriétaire OU si c'est un admin
        if (auth()->id() !== $drop->user_id && !Gate::allows('access-admin')) {
            abort(403, "Vous n'avez pas le droit de supprimer cette donnée.");
        }

        $drop->delete();

        // Redirection vers la page d'où on vient (Admin ou Liste perso)
        if (Gate::allows('access-admin') && str_contains(url()->previous(), 'admin')) {
            return redirect()->route('admin.drops.index')->with('success', 'Donnée modérée.');
        }

        return redirect()->route('drops.index')->with('success', 'Item supprimé !');
    }
}