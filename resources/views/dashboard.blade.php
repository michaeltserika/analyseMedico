@extends('layouts.app')
@section('content')
<div class="container">
    <h1><i class="fas fa-chart-line me-2"></i> Tableau de bord</h1>
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
