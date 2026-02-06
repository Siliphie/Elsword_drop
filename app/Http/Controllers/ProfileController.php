<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth; // Ajout nécessaire pour la déconnexion
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
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
            return redirect()->route('home')->with('status', 'profile-updated');
        }

        return redirect()->route('home')->with('info', 'no modification have been made');
    }

    /**
     * Supprime le compte de l'utilisateur.
     */
    public function destroy(Request $request)
    {
        $user = auth()->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/')->with('success', 'Votre compte a été supprimé.');
    }
}