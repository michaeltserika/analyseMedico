<?php

namespace App\Http\Controllers;

use App\Models\Resultat;
use App\Models\Analyse;
use Illuminate\Http\Request;

class ResultatController extends Controller
{
    public function index()
    {
        $resultats = Resultat::with('analyse')->get();
        return view('resultats.index', compact('resultats'));
    }

    public function create()
    {
        $analyses = Analyse::all();
        return view('resultats.create', compact('analyses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_analyse' => 'required|exists:analyses,id_analyse',
            'valeur' => 'required|string',
            'commentaire' => 'nullable|string',
            'date_resultat' => 'required|date',
        ]);

        Resultat::create($request->all());
        return redirect()->route('resultats.index')->with('success', 'Résultat ajouté avec succès.');
    }

    public function edit(Resultat $resultat)
    {
        $analyses = Analyse::all();
        return view('resultats.edit', compact('resultat', 'analyses'));
    }

    public function update(Request $request, Resultat $resultat)
    {
        $request->validate([
            'id_analyse' => 'required|exists:analyses,id_analyse',
            'valeur' => 'required|string',
            'commentaire' => 'nullable|string',
            'date_resultat' => 'required|date',
        ]);

        $resultat->update($request->all());
        return redirect()->route('resultats.index')->with('success', 'Résultat mis à jour avec succès.');
    }

    public function destroy(Resultat $resultat)
    {
        $resultat->delete();
        return redirect()->route('resultats.index')->with('success', 'Résultat supprimé avec succès.');
    }
}
