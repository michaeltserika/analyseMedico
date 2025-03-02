@extends('layouts.app')
@section('content')
<div class="container">
    <h1><i class="fas fa-vial me-2"></i> Liste des Analyses</h1>
    <a href="{{ route('analyses.create') }}" class="btn btn-primary mb-4"><i class="fas fa-plus me-2"></i> Ajouter une Analyse</a>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th><i class="fas fa-user me-1"></i> Patient</th>
                <th><i class="fas fa-user-md me-1"></i> Médecin</th>
                <th><i class="fas fa-flask me-1"></i> Type Analyse</th>
                <th><i class="fas fa-calendar-alt me-1"></i> Date</th>
                <th><i class="fas fa-tools me-1"></i> Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($analyses as $analyse)
            <tr>
                <td>{{ $analyse->patient->nom }} {{ $analyse->patient->prenom }}</td>
                <td>{{ $analyse->medecin->nom }}</td>
                <td>{{ $analyse->type_analyse }}</td>
                <td>{{ $analyse->date_analyse }}</td>
                <td>
                    <a href="{{ route('analyses.edit', $analyse) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit me-1"></i> Modifier</a>
                    <form action="{{ route('analyses.destroy', $analyse) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Confirmer la suppression ?')"><i class="fas fa-trash me-1"></i> Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center"><i class="fas fa-exclamation-circle me-1"></i> Aucune analyse trouvée.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
