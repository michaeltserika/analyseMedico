@extends('layouts.app')
@section('content')
<div class="container">
    <h1><i class="fas fa-file-alt me-2"></i> Liste des Résultats</h1>
    <a href="{{ route('resultats.create') }}" class="btn btn-primary mb-4"><i class="fas fa-plus me-2"></i> Ajouter un Résultat</a>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th><i class="fas fa-vial me-1"></i> Analyse</th>
                <th><i class="fas fa-info-circle me-1"></i> Valeur</th>
                <th><i class="fas fa-calendar-alt me-1"></i> Date</th>
                <th><i class="fas fa-tools me-1"></i> Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($resultats as $resultat)
            <tr>
                <td>{{ $resultat->analyse->type_analyse }}</td>
                <td>{{ $resultat->valeur }}</td>
                <td>{{ $resultat->date_resultat }}</td>
                <td>
                    <a href="{{ route('resultats.edit', $resultat) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit me-1"></i> Modifier</a>
                    <form action="{{ route('resultats.destroy', $resultat) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Confirmer la suppression ?')"><i class="fas fa-trash me-1"></i> Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center"><i class="fas fa-exclamation-circle me-1"></i> Aucun résultat trouvé.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
