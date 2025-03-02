<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $primaryKey = 'id_patient';
    protected $fillable = ['nom', 'prenom', 'date_naissance', 'sexe', 'adresse', 'telephone'];

    public function analyses()
    {
        return $this->hasMany(Analyse::class, 'id_patient', 'id_patient');
    }
}
