@extends('layouts.app')
@section('content')
<div class="container">
    <h1><i class="fas fa-user-md me-2"></i> Liste des Médecins</h1>
    <a href="{{ route('medecins.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus me-1"></i> Ajouter un Médecin</a>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Image</th>
                <th>Nom</th>
                <th>Spécialité</th>
                <th>Téléphone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($medecins as $medecin)
            <tr>
                <td>
                    @if($medecin->image)
                        <img src="{{ asset('storage/' . $medecin->image) }}" alt="{{ $medecin->nom }}" style="width: 50px; border-radius: 50%;">
                    @else
                        <i class="fas fa-user-md fa-2x"></i>
                    @endif
                </td>
                <td>{{ $medecin->nom }}</td>
                <td>{{ $medecin->specialite }}</td>
                <td>{{ $medecin->telephone }}</td>
                <td>
                    <a href="{{ route('medecins.edit', $medecin) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit me-1"></i> Modifier</a>
                    <form action="{{ route('medecins.destroy', $medecin) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Confirmer la suppression ?')"><i class="fas fa-trash me-1"></i> Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Aucun médecin trouvé.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
