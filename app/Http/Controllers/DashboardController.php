<?php

namespace App\Http\Controllers;

use App\Models\Analyse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $analysesParMois = Analyse::selectRaw('MONTH(date_analyse) as mois, COUNT(*) as total')
            ->groupBy('mois')
            ->pluck('total', 'mois')
            ->toArray();

        return view('dashboard', compact('analysesParMois'));
    }
}
