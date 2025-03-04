@extends('layouts.app')
@section('content')
<div class="container">
    <h1 ><i class="fas fa-chart-line me-2"></i> Tableau de bord</h1>

    <!-- Section des compteurs -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-flask me-2"></i> Analyses</h5>
                    <p class="card-text display-4">{{ $totalAnalyses }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-users me-2"></i> Patients</h5>
                    <p class="card-text display-4">{{ $totalPatients }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-user-md me-2"></i> Médecins</h5>
                    <p class="card-text display-4">{{ $totalMedecins }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-file-invoice me-2"></i> Factures</h5>
                    <p class="card-text display-4">{{ $totalFactures }}</p>
                </div>
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

    <div class="row mb-4" style="margin-top: 2em;">

        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-chart-pie me-2"></i> Résultats</h5>
                    <p class="card-text display-4">{{ $totalResultats }}</p>
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
