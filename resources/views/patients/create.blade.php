@extends('layouts.app')
@section('content')
<div class="container">
    <h1><i class="fas fa-user-plus me-2"></i> Ajouter un Patient</h1>
    <form action="{{ route('patients.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label"><i class="fas fa-signature me-1"></i> Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label"><i class="fas fa-signature me-1"></i> Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
        </div>
        <div class="mb-3">
            <label for="date_naissance" class="form-label"><i class="fas fa-calendar-alt me-1"></i> Date de Naissance</label>
            <input type="date" class="form-control" id="date_naissance" name="date_naissance" required>
        </div>
        <div class="mb-3">
            <label for="sexe" class="form-label"><i class="fas fa-venus-mars me-1"></i> Sexe</label>
            <select class="form-control" id="sexe" name="sexe" required>
                <option value="M">Masculin</option>
                <option value="F">Féminin</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="adresse" class="form-label"><i class="fas fa-map-marker-alt me-1"></i> Adresse</label>
            <textarea class="form-control" id="adresse" name="adresse" required></textarea>
        </div>
        <div class="mb-3">
            <label for="telephone" class="form-label"><i class="fas fa-phone me-1"></i> Téléphone</label>
            <input type="text" class="form-control" id="telephone" name="telephone" required>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i> Ajouter</button>
    </form>
</div>
@endsection
