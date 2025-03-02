@extends('layouts.app')
@section('content')
<div class="container">
    <h1><i class="fas fa-file-alt me-2"></i> Ajouter un Résultat</h1>
    <form action="{{ route('resultats.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_analyse" class="form-label"><i class="fas fa-vial me-1"></i> Analyse</label>
            <select class="form-control" id="id_analyse" name="id_analyse" required>
                @foreach($analyses as $analyse)
                    <option value="{{ $analyse->id_analyse }}">{{ $analyse->type_analyse }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="valeur" class="form-label"><i class="fas fa-info-circle me-1"></i> Valeur</label>
            <textarea class="form-control" id="valeur" name="valeur" required></textarea>
        </div>
        <div class="mb-3">
            <label for="commentaire" class="form-label"><i class="fas fa-comment me-1"></i> Commentaire</label>
            <textarea class="form-control" id="commentaire" name="commentaire"></textarea>
        </div>
        <div class="mb-3">
            <label for="date_resultat" class="form-label"><i class="fas fa-calendar-alt me-1"></i> Date</label>
            <input type="date" class="form-control" id="date_resultat" name="date_resultat" required>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i> Ajouter</button>
    </form>
</div>
@endsection
