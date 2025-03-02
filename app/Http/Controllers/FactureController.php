<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Analyse;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    public function index()
    {
        $factures = Facture::with('analyse')->get();
        return view('factures.index', compact('factures'));
    }

    public function create()
    {
        $analyses = Analyse::all();
        return view('factures.create', compact('analyses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_analyse' => 'required|exists:analyses,id_analyse',
            'montant' => 'required|numeric|min:0',
            'etat_paiement' => 'required|in:Payé,Non payé',
            'date_paiement' => 'nullable|date',
        ]);

        Facture::create($request->all());
        return redirect()->route('factures.index')->with('success', 'Facture ajoutée avec succès.');
    }

    public function edit(Facture $facture)
    {
        $analyses = Analyse::all();
        return view('factures.edit', compact('facture', 'analyses'));
    }

    public function update(Request $request, Facture $facture)
    {
        $request->validate([
            'id_analyse' => 'required|exists:analyses,id_analyse',
            'montant' => 'required|numeric|min:0',
            'etat_paiement' => 'required|in:Payé,Non payé',
            'date_paiement' => 'nullable|date',
        ]);

        $facture->update($request->all());
        return redirect()->route('factures.index')->with('success', 'Facture mise à jour avec succès.');
    }

    public function destroy(Facture $facture)
    {
        $facture->delete();
        return redirect()->route('factures.index')->with('success', 'Facture supprimée avec succès.');
    }
}
