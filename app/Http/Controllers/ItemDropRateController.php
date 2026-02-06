<?php
namespace App\Http\Controllers;

use App\Models\ItemDropRate;
use Illuminate\Http\Request;

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

        return redirect()->back()->with('success', 'Statistiques ajoutées !');
    }
}