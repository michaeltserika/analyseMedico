@extends('layouts.app')
@section('content')
<div class="container">
    <h1><i class="fas fa-user me-2"></i> Détails du Patient</h1>
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <i class="fas fa-info-circle me-2"></i> Informations
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong><i class="fas fa-signature me-1"></i> Nom :</strong> {{ $patient->nom }}</p>
                    <p><strong><i class="fas fa-signature me-1"></i> Prénom :</strong> {{ $patient->prenom }}</p>
                    <p><strong><i class="fas fa-calendar-alt me-1"></i> Date de Naissance :</strong> {{ $patient->date_naissance }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong><i class="fas fa-venus-mars me-1"></i> Sexe :</strong> {{ $patient->sexe == 'M' ? 'Masculin' : 'Féminin' }}</p>
                    <p><strong><i class="fas fa-map-marker-alt me-1"></i> Adresse :</strong> {{ $patient->adresse }}</p>
                    <p><strong><i class="fas fa-phone me-1"></i> Téléphone :</strong> {{ $patient->telephone }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <a href="{{ route('patients.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left me-2"></i> Retour à la liste</a>
        <a href="{{ route('patients.edit', $patient) }}" class="btn btn-warning ms-2"><i class="fas fa-edit me-2"></i> Modifier</a>
    </div>
</div>
@endsection
