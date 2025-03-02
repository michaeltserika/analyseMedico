<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $primaryKey = 'id_facture';
    protected $fillable = ['id_analyse', 'montant', 'etat_paiement', 'date_paiement'];

    public function analyse()
    {
        return $this->belongsTo(Analyse::class, 'id_analyse', 'id_analyse');
    }
}
