<?php
namespace App\Http\Controllers;

use App\Models\Analyse;
use App\Models\Patient;
use App\Models\Medecin;
use App\Models\Facture;
use App\Models\Resultat;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function index(Request $request)
    {
        $dateDebut = $request->input('date_debut');
        $dateFin = $request->input('date_fin');

        // Initialisation des variables
        $totalAnalyses = 0;
        $totalPatients = 0;
        $totalMedecins = 0;
        $totalFactures = 0;
        $totalResultats = 0;
        $analysesParMois = [];

        // Si des dates sont fournies, calculer les statistiques
        if ($dateDebut && $dateFin) {
            $query = Analyse::whereBetween('date_analyse', [$dateDebut, $dateFin]);
            $totalAnalyses = $query->count();

            $totalPatients = Patient::whereHas('analyses', function ($q) use ($dateDebut, $dateFin) {
                $q->whereBetween('date_analyse', [$dateDebut, $dateFin]);
            })->count();

            $totalMedecins = Medecin::whereHas('analyses', function ($q) use ($dateDebut, $dateFin) {
                $q->whereBetween('date_analyse', [$dateDebut, $dateFin]);
            })->count();

            $totalFactures = Facture::whereHas('analyse', function ($q) use ($dateDebut, $dateFin) {
                $q->whereBetween('date_analyse', [$dateDebut, $dateFin]);
            })->count();

            $totalResultats = Resultat::whereHas('analyse', function ($q) use ($dateDebut, $dateFin) {
                $q->whereBetween('date_analyse', [$dateDebut, $dateFin]);
            })->count();

            $analysesParMois = Analyse::selectRaw('MONTH(date_analyse) as mois, COUNT(*) as total')
                ->whereBetween('date_analyse', [$dateDebut, $dateFin])
                ->groupBy('mois')
                ->pluck('total', 'mois')
                ->toArray();
        }

        return view('stats.index', compact(
            'totalAnalyses',
            'totalPatients',
            'totalMedecins',
            'totalFactures',
            'totalResultats',
            'analysesParMois',
            'dateDebut',
            'dateFin'
        ));
    }
}
