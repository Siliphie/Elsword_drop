<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Ajout nécessaire
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    // Cette méthode manquait ! Elle permet d'afficher la page.
    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'erp' => 'nullable|integer|min:0|max:1500',
            'current_password' => ['nullable', 'required_with:password', 'current_password'],
            'password' => ['nullable', 'confirmed', Password::defaults()],
        ]);

        $dataToUpdate = array_filter($validatedData, function($value) {
            return !is_null($value) && $value !== '';
        });

        if (!empty($dataToUpdate['password'])) {
            $dataToUpdate['password'] = Hash::make($dataToUpdate['password']);
        }

        unset($dataToUpdate['current_password']);

        if (!empty($dataToUpdate)) {
            $user->update($dataToUpdate);
            return back()->with('success', 'Profil mis à jour avec succès !');
        }

        return back()->with('info', 'Aucune modification effectuée.');
    }
    
    // N'oublie pas de remettre ta méthode destroy() ici si tu l'avais enlevée !
}