<?php
namespace App\Http\Controllers;

use App\Models\Analyse;
use App\Models\Patient;
use App\Models\Medecin;
use App\Models\Facture;
use App\Models\Resultat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            // Compteurs pour chaque table avec valeur par défaut à 0
            $totalAnalyses = Analyse::count() ?? 0;
            $totalPatients = Patient::count() ?? 0;
            $totalMedecins = Medecin::count() ?? 0;
            $totalFactures = Facture::count() ?? 0;
            $totalResultats = Resultat::count() ?? 0;

            // Statistiques des analyses par mois
            $analysesParMois = Analyse::selectRaw('DAYS(date_analyse) as mois, COUNT(*) as total')
                ->groupBy('mois')
                ->pluck('total', 'mois')
                ->toArray();

            return view('dashboard', compact(
                'totalAnalyses',
                'totalPatients',
                'totalMedecins',
                'totalFactures',
                'totalResultats',
                'analysesParMois'
            ));
        } catch (\Exception $e) {
            // En cas d'erreur, retourner la vue avec des valeurs par défaut
            $defaults = [
                'totalAnalyses' => 0,
                'totalPatients' => 0,
                'totalMedecins' => 0,
                'totalFactures' => 0,
                'totalResultats' => 0,
                'analysesParMois' => []
            ];
            return view('dashboard', $defaults)->with('error', 'Erreur lors du chargement des données');
        }
    }
}
