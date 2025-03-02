@extends('layouts.app')
@section('content')
<div class="container">
    <h1><i class="fas fa-vial me-2"></i> Ajouter une Analyse</h1>
    <form action="{{ route('analyses.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_patient" class="form-label"><i class="fas fa-user me-1"></i> Patient</label>
            <select class="form-control" id="id_patient" name="id_patient" required>
                @foreach($patients as $patient)
                    <option value="{{ $patient->id_patient }}">{{ $patient->nom }} {{ $patient->prenom }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_medecin" class="form-label"><i class="fas fa-user-md me-1"></i> Médecin</label>
            <select class="form-control" id="id_medecin" name="id_medecin" required>
                @foreach($medecins as $medecin)
                    <option value="{{ $medecin->id_medecin }}">{{ $medecin->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="type_analyse" class="form-label"><i class="fas fa-flask me-1"></i> Type d’Analyse</label>
            <input type="text" class="form-control" id="type_analyse" name="type_analyse" required>
        </div>
        <div class="mb-3">
            <label for="date_analyse" class="form-label"><i class="fas fa-calendar-alt me-1"></i> Date</label>
            <input type="date" class="form-control" id="date_analyse" name="date_analyse" required>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i> Ajouter</button>
    </form>
</div>
@endsection
