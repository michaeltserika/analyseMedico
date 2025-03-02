<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Analyse extends Model
{
    protected $primaryKey = 'id_analyse';
    protected $fillable = ['id_patient', 'id_medecin', 'type_analyse', 'date_analyse'];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'id_patient', 'id_patient');
    }

    public function medecin()
    {
        return $this->belongsTo(Medecin::class, 'id_medecin', 'id_medecin');
    }

    public function resultats()
    {
        return $this->hasMany(Resultat::class, 'id_analyse', 'id_analyse');
    }

    public function facture()
    {
        return $this->hasOne(Facture::class, 'id_analyse', 'id_analyse');
    }
}
