<?php

namespace App\Http\Controllers;

use App\Models\Analyse;
use App\Models\Patient;
use App\Models\Medecin;
use Illuminate\Http\Request;

class AnalyseController extends Controller
{
    public function index()
    {
        $analyses = Analyse::with(['patient', 'medecin'])->get();
        return view('analyses.index', compact('analyses'));
    }

    public function create()
    {
        $patients = Patient::all();
        $medecins = Medecin::all();
        return view('analyses.create', compact('patients', 'medecins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_patient' => 'required|exists:patients,id_patient',
            'id_medecin' => 'required|exists:medecins,id_medecin',
            'type_analyse' => 'required|string|max:100',
            'date_analyse' => 'required|date',
        ]);

        Analyse::create($request->all());
        return redirect()->route('analyses.index')->with('success', 'Analyse ajoutée avec succès.');
    }

    public function edit(Analyse $analyse)
    {
        $patients = Patient::all();
        $medecins = Medecin::all();
        return view('analyses.edit', compact('analyse', 'patients', 'medecins'));
    }

    public function update(Request $request, Analyse $analyse)
    {
        $request->validate([
            'id_patient' => 'required|exists:patients,id_patient',
            'id_medecin' => 'required|exists:medecins,id_medecin',
            'type_analyse' => 'required|string|max:100',
            'date_analyse' => 'required|date',
        ]);

        $analyse->update($request->all());
        return redirect()->route('analyses.index')->with('success', 'Analyse mise à jour avec succès.');
    }

    public function destroy(Analyse $analyse)
    {
        $analyse->delete();
        return redirect()->route('analyses.index')->with('success', 'Analyse supprimée avec succès.');
    }
}
