<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComptesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comptes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categorie_compte_id');
            $table->string('numero_compte');
            $table->string('nom_compte');
            $table->string('lieu_travail');
            $table->string('nif');
            $table->string('rc');
            $table->string('solde');
            $table->string('telephone');
            $table->string('email');
            $table->timestamps();
            $table->foreign('categorie_compte_id')
                  ->references('id') 
                  ->on('categorie_comptes')
                  ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comptes');
    }
}
