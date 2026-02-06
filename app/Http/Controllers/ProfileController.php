<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    ]);

    $filteredData = array_filter($validatedData, function($value) {
        return !is_null($value) && $value !== '';
    });

    if (!empty($filteredData)) {
        $user->update($filteredData);
        return back()->with('success', 'Profil mis à jour !');
    }

    return back()->with('info', 'Aucune modification effectuée.');
}
}
