@extends('layouts.app')
@section('content')
<div class="container">
    <h1><i class="fas fa-user-md me-2"></i> Modifier Médecin</h1>
    <form action="{{ route('medecins.update', $medecin) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $medecin->nom }}" required>
        </div>
        <div class="mb-3">
            <label for="specialite" class="form-label">Spécialité</label>
            <input type="text" class="form-control" id="specialite" name="specialite" value="{{ $medecin->specialite }}" required>
        </div>
        <div class="mb-3">
            <label for="telephone" class="form-label">Téléphone</label>
            <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $medecin->telephone }}" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Photo</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($medecin->image)
                <img src="{{ asset('storage/' . $medecin->image) }}" alt="{{ $medecin->nom }}" style="width: 100px; border-radius: 10px; margin-top: 10px;">
            @endif
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Mettre à jour</button>
    </form>
</div>
@endsection
