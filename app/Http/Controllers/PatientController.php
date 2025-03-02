<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'date_naissance' => 'required|date',
            'sexe' => 'required|in:M,F',
            'adresse' => 'required|string',
            'telephone' => 'required|string|max:15',
        ]);

        Patient::create($request->all());
        return redirect()->route('patients.index')->with('success', 'Patient ajouté avec succès.');
    }

    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'date_naissance' => 'required|date',
            'sexe' => 'required|in:M,F',
            'adresse' => 'required|string',
            'telephone' => 'required|string|max:15',
        ]);

        $patient->update($request->all());
        return redirect()->route('patients.index')->with('success', 'Patient mis à jour avec succès.');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient supprimé avec succès.');
    }

    public function exportPdf()
    {
        $patients = Patient::all();
        $pdf = Pdf::loadView('patients.pdf', compact('patients'));
        return $pdf->download('patients.pdf');
    }
}
