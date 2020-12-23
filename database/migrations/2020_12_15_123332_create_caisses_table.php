<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaissesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caisses', function (Blueprint $table) {
            $table->id();
            $table->string('numero_caisse')->unique();
            $table->string('solde')->nullable();
            $table->unsignedBigInteger('guichet_id');
            $table->timestamps();
            $table->foreign('guichet_id') 
            ->references('id') 
            ->on('guichets') 
            ->onDelete('cascade') 
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caisses');
    }
}
