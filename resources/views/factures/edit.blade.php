@extends('layouts.app')
@section('content')
<div class="container">
    <h1><i class="fas fa-file-invoice me-2"></i> Modifier Facture</h1>
    <form action="{{ route('factures.update', $facture) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_analyse" class="form-label"><i class="fas fa-vial me-1"></i> Analyse</label>
            <select class="form-control" id="id_analyse" name="id_analyse" required>
                @foreach($analyses as $analyse)
                    <option value="{{ $analyse->id_analyse }}" {{ $facture->id_analyse == $analyse->id_analyse ? 'selected' : '' }}>
                        {{ $analyse->type_analyse }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="montant" class="form-label"><i class="fas fa-money-bill me-1"></i> Montant</label>
            <input type="number" step="0.01" class="form-control" id="montant" name="montant" value="{{ $facture->montant }}" required>
        </div>
        <div class="mb-3">
            <label for="etat_paiement" class="form-label"><i class="fas fa-check-circle me-1"></i> État Paiement</label>
            <select class="form-control" id="etat_paiement" name="etat_paiement" required>
                <option value="Payé" {{ $facture->etat_paiement == 'Payé' ? 'selected' : '' }}>Payé</option>
                <option value="Non payé" {{ $facture->etat_paiement == 'Non payé' ? 'selected' : '' }}>Non payé</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="date_paiement" class="form-label"><i class="fas fa-calendar-alt me-1"></i> Date Paiement</label>
            <input type="date" class="form-control" id="date_paiement" name="date_paiement" value="{{ $facture->date_paiement }}">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i> Mettre à jour</button>
    </form>
</div>
@endsection
