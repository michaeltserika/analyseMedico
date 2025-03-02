<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resultat extends Model
{
    protected $primaryKey = 'id_resultat';
    protected $fillable = ['id_analyse', 'valeur', 'commentaire', 'date_resultat'];

    public function analyse()
    {
        return $this->belongsTo(Analyse::class, 'id_analyse', 'id_analyse');
    }
}
