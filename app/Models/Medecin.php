<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    protected $primaryKey = 'id_medecin';
    protected $fillable = ['nom', 'specialite', 'telephone', 'image'];

    public function analyses()
    {
        return $this->hasMany(Analyse::class, 'id_medecin', 'id_medecin');
    }
}
