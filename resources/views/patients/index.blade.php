@extends('layouts.app')
@section('content')
<div class="container">
    <h1><i class="fas fa-user me-2"></i> Liste des Patients</h1>
    <div class="d-flex justify-content-between mb-4">
        <a href="{{ route('patients.create') }}" class="btn btn-primary"><i class="fas fa-plus me-2"></i> Ajouter un Patient</a>
        <a href="{{ route('patients.export') }}" class="btn btn-success"><i class="fas fa-file-pdf me-2"></i> Exporter en PDF</a>
    </div>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th><i class="fas fa-signature me-1"></i> Nom</th>
                <th><i class="fas fa-signature me-1"></i> Prénom</th>
                <th><i class="fas fa-phone me-1"></i> Téléphone</th>
                <th><i class="fas fa-tools me-1"></i> Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($patients as $patient)
            <tr>
                <td>{{ $patient->nom }}</td>
                <td>{{ $patient->prenom }}</td>
                <td>{{ $patient->telephone }}</td>
                <td>
                    <a href="{{ route('patients.edit', $patient) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit me-1"></i> Modifier</a>
                    <form action="{{ route('patients.destroy', $patient) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Confirmer la suppression ?')"><i class="fas fa-trash me-1"></i> Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center"><i class="fas fa-exclamation-circle me-1"></i> Aucun patient trouvé.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
