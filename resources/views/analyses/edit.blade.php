@extends('layouts.app')
@section('content')
<div class="container">
    <h1><i class="fas fa-vial me-2"></i> Modifier Analyse</h1>
    <form action="{{ route('analyses.update', $analyse) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_patient" class="form-label"><i class="fas fa-user me-1"></i> Patient</label>
            <select class="form-control" id="id_patient" name="id_patient" required>
                @foreach($patients as $patient)
                    <option value="{{ $patient->id_patient }}" {{ $analyse->id_patient == $patient->id_patient ? 'selected' : '' }}>
                        {{ $patient->nom }} {{ $patient->prenom }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_medecin" class="form-label"><i class="fas fa-user-md me-1"></i> Médecin</label>
            <select class="form-control" id="id_medecin" name="id_medecin" required>
                @foreach($medecins as $medecin)
                    <option value="{{ $medecin->id_medecin }}" {{ $analyse->id_medecin == $medecin->id_medecin ? 'selected' : '' }}>
                        {{ $medecin->nom }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="type_analyse" class="form-label"><i class="fas fa-flask me-1"></i> Type d’Analyse</label>
            <input type="text" class="form-control" id="type_analyse" name="type_analyse" value="{{ $analyse->type_analyse }}" required>
        </div>
        <div class="mb-3">
            <label for="date_analyse" class="form-label"><i class="fas fa-calendar-alt me-1"></i> Date</label>
            <input type="date" class="form-control" id="date_analyse" name="date_analyse" value="{{ $analyse->date_analyse }}" required>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i> Mettre à jour</button>
    </form>
</div>
@endsection
