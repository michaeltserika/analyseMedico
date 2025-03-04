@extends('layouts.app')
@section('content')
<div class="container">
    <h1><i class="fas fa-user-md me-2"></i> Ajouter un Médecin</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('medecins.store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="specialite" class="form-label"><i class="fas fa-stethoscope me-1"></i> Spécialité</label>
            <input type="text"
                   class="form-control @error('specialite') is-invalid @enderror"
                   id="specialite"
                   name="specialite"
                   value="{{ old('specialite') }}"
                   required>
            @error('specialite')
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
        <div class="mb-3">
            <label for="image" class="form-label"><i class="fas fa-image me-1"></i> Photo</label>
            <input type="file"
                   class="form-control @error('image') is-invalid @enderror"
                   id="image"
                   name="image">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Ajouter</button>
    </form>
</div>
@endsection
