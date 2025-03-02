@extends('layouts.app')
@section('content')
<div class="container">
    <h1><i class="fas fa-user-md me-2"></i> Ajouter un Médecin</h1>
    <form action="{{ route('medecins.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="mb-3">
            <label for="specialite" class="form-label">Spécialité</label>
            <input type="text" class="form-control" id="specialite" name="specialite" required>
        </div>
        <div class="mb-3">
            <label for="telephone" class="form-label">Téléphone</label>
            <input type="text" class="form-control" id="telephone" name="telephone" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Photo</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Ajouter</button>
    </form>
</div>
@endsection
