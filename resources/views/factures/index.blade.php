@extends('layouts.app')
@section('content')
<div class="container">
    <h1><i class="fas fa-file-invoice me-2"></i> Liste des Factures</h1>
    <a href="{{ route('factures.create') }}" class="btn btn-primary mb-4"><i class="fas fa-plus me-2"></i> Ajouter une Facture</a>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th><i class="fas fa-vial me-1"></i> Analyse</th>
                <th><i class="fas fa-money-bill me-1"></i> Montant</th>
                <th><i class="fas fa-check-circle me-1"></i> État Paiement</th>
                <th><i class="fas fa-tools me-1"></i> Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($factures as $facture)
            <tr>
                <td>{{ $facture->analyse->type_analyse }}</td>
                <td>{{ $facture->montant }}</td>
                <td>{{ $facture->etat_paiement }}</td>
                <td>
                    <a href="{{ route('factures.edit', $facture) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit me-1"></i> Modifier</a>
                    <form action="{{ route('factures.destroy', $facture) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Confirmer la suppression ?')"><i class="fas fa-trash me-1"></i> Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center"><i class="fas fa-exclamation-circle me-1"></i> Aucune facture trouvée.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
