@extends('layouts.app')
@section('content')
<div class="container">
    <h1><i class="fas fa-user-plus me-2"></i> Ajouter un Patient</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('patients.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label"><i class="fas fa-signature me-1"></i> Nom</label>
            <input type="text"
                   class="form-control @error('nom') is-invalid @enderror"
                   id="nom"
                   name="nom"
                   value="{{ old('nom') }}"
                   required
                   pattern="[A-Za-zÀ-ÿ\s]+"
                   title="Seules les lettres et les espaces sont autorisés">
            @error('nom')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label"><i class="fas fa-signature me-1"></i> Prénom</label>
            <input type="text"
                   class="form-control @error('prenom') is-invalid @enderror"
                   id="prenom"
                   name="prenom"
                   value="{{ old('prenom') }}"
                   required
                   pattern="[A-Za-zÀ-ÿ\s]+"
                   title="Seules les lettres et les espaces sont autorisés">
            @error('prenom')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="date_naissance" class="form-label"><i class="fas fa-calendar-alt me-1"></i> Date de Naissance</label>
            <input type="date"
                   class="form-control @error('date_naissance') is-invalid @enderror"
                   id="date_naissance"
                   name="date_naissance"
                   value="{{ old('date_naissance') }}"
                   required>
            @error('date_naissance')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="sexe" class="form-label"><i class="fas fa-venus-mars me-1"></i> Sexe</label>
            <select class="form-control @error('sexe') is-invalid @enderror"
                    id="sexe"
                    name="sexe"
                    required>
                <option value="M" {{ old('sexe') == 'M' ? 'selected' : '' }}>Masculin</option>
                <option value="F" {{ old('sexe') == 'F' ? 'selected' : '' }}>Féminin</option>
            </select>
            @error('sexe')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="adresse" class="form-label"><i class="fas fa-map-marker-alt me-1"></i> Adresse</label>
            <textarea class="form-control @error('adresse') is-invalid @enderror"
                      id="adresse"
                      name="adresse"
                      required>{{ old('adresse') }}</textarea>
            @error('adresse')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="telephone" class="form-label"><i class="fas fa-phone me-1"></i> Téléphone</label>
            <input type="text"
                   class="form-control @error('telephone') is-invalid @enderror"
                   id="telephone"
                   name="telephone"
                   value="{{ old('telephone') }}"
                   required
                   pattern="[0-9]{10}"
                   maxlength="10"
                   title="Le numéro doit contenir exactement 10 chiffres">
            @error('telephone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i> Ajouter</button>
    </form>
</div>
@endsection
