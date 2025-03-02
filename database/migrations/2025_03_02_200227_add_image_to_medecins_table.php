<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('medecins', function (Blueprint $table) {
            $table->string('image')->nullable()->after('telephone');
        });
    }

    public function down()
    {
        Schema::table('medecins', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};
