<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use Illuminate\Http\Request;

class MedecinController extends Controller
{
    public function index()
    {
        $medecins = Medecin::all();
        return view('medecins.index', compact('medecins'));
    }

    public function create()
    {
        return view('medecins.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'specialite' => 'required|string|max:100',
            'telephone' => 'required|string|max:15',
            'image' => 'nullable|image|max:2048', // Image optionnelle, max 2MB
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('medecins', 'public');
        }

        Medecin::create($data);
        return redirect()->route('medecins.index')->with('success', 'Médecin ajouté avec succès.');
    }

    public function edit(Medecin $medecin)
    {
        return view('medecins.edit', compact('medecin'));
    }

    public function update(Request $request, Medecin $medecin)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'specialite' => 'required|string|max:100',
            'telephone' => 'required|string|max:15',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('medecins', 'public');
        }

        $medecin->update($data);
        return redirect()->route('medecins.index')->with('success', 'Médecin mis à jour avec succès.');
    }

    public function destroy(Medecin $medecin)
    {
        $medecin->delete();
        return redirect()->route('medecins.index')->with('success', 'Médecin supprimé avec succès.');
    }
}
