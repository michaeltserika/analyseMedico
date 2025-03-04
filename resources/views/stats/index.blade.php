@extends('layouts.app')
@section('content')
<div class="container">
    <h1><i class="fas fa-chart-line me-2"></i> Statistiques {{ $dateDebut && $dateFin ? "pour la période du $dateDebut au $dateFin" : 'globales' }}</h1>

    <!-- Formulaire de recherche -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('stats.index') }}" class="row g-3">
                <div class="col-md-5">
                    <label for="date_debut" class="form-label">Date Début</label>
                    <input type="date" class="form-control" id="date_debut" name="date_debut" value="{{ $dateDebut ?? '' }}">
                </div>
                <div class="col-md-5">
                    <label for="date_fin" class="form-label">Date Fin</label>
                    <input type="date" class="form-control" id="date_fin" name="date_fin" value="{{ $dateFin ?? '' }}">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-search me-2"></i>Rechercher</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Affichage des statistiques en tableau -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-dark text-white">
            <i class="fas fa-table me-2"></i> Statistiques
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col"><i class="fas fa-flask me-2"></i>Analyses</th>
                            <th scope="col"><i class="fas fa-users me-2"></i>Patients</th>
                            <th scope="col"><i class="fas fa-user-md me-2"></i>Médecins</th>
                            <th scope="col"><i class="fas fa-file-invoice me-2"></i>Factures</th>
                            <th scope="col"><i class="fas fa-chart-pie me-2"></i>Résultats</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bold fs-4">{{ $totalAnalyses }}</td>
                            <td class="fw-bold fs-4">{{ $totalPatients }}</td>
                            <td class="fw-bold fs-4">{{ $totalMedecins }}</td>
                            <td class="fw-bold fs-4">{{ $totalFactures }}</td>
                            <td class="fw-bold fs-4">{{ $totalResultats }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Graphique des analyses par mois -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white"><i class="fas fa-chart-bar me-2"></i> Analyses par Mois</div>
                <div class="card-body">
                    <canvas id="analyseChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const ctx = document.getElementById('analyseChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sept', 'Oct', 'Nov', 'Déc'],
            datasets: [{
                label: 'Analyses par mois',
                data: @json($analysesParMois),
                backgroundColor: '#25D366',
                borderColor: '#075E54',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: { display: true, text: 'Nombre d\'analyses' }
                },
                x: {
                    title: { display: true, text: 'Mois' }
                }
            },
            plugins: {
                legend: { display: true, position: 'top' }
            }
        }
    });
</script>
@endsection
