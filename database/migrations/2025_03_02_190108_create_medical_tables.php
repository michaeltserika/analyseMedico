<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalTables extends Migration
{
    public function up()
    {
        // Table Patient
        Schema::create('patients', function (Blueprint $table) {
            $table->id('id_patient');
            $table->string('nom', 100);
            $table->string('prenom', 100);
            $table->date('date_naissance');
            $table->enum('sexe', ['M', 'F']);
            $table->text('adresse');
            $table->string('telephone', 15);
            $table->timestamps();
        });

        // Table Médecin
        Schema::create('medecins', function (Blueprint $table) {
            $table->id('id_medecin');
            $table->string('nom', 100);
            $table->string('specialite', 100);
            $table->string('telephone', 15);
            $table->timestamps();
        });

        // Table Analyse
        Schema::create('analyses', function (Blueprint $table) {
            $table->id('id_analyse');
            $table->foreignId('id_patient')->constrained('patients', 'id_patient')->onDelete('cascade');
            $table->foreignId('id_medecin')->constrained('medecins', 'id_medecin')->onDelete('cascade');
            $table->string('type_analyse', 100);
            $table->date('date_analyse');
            $table->timestamps();
        });

        // Table Résultat
        Schema::create('resultats', function (Blueprint $table) {
            $table->id('id_resultat');
            $table->foreignId('id_analyse')->constrained('analyses', 'id_analyse')->onDelete('cascade');
            $table->text('valeur');
            $table->text('commentaire')->nullable();
            $table->date('date_resultat');
            $table->timestamps();
        });

        // Table Facture
        Schema::create('factures', function (Blueprint $table) {
            $table->id('id_facture');
            $table->foreignId('id_analyse')->constrained('analyses', 'id_analyse')->onDelete('cascade');
            $table->decimal('montant', 10, 2);
            $table->enum('etat_paiement', ['Payé', 'Non payé'])->default('Non payé');
            $table->date('date_paiement')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('factures');
        Schema::dropIfExists('resultats');
        Schema::dropIfExists('analyses');
        Schema::dropIfExists('medecins');
        Schema::dropIfExists('patients');
    }
}
