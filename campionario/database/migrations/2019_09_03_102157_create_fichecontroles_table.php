<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichecontrolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
          Schema::create('fichecontroles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user');
            $table->string('numero');
            $table->integer('idaccessoire');
            $table->string('couleuraccessoire');
            $table->integer('idfournisseur');
            $table->string('typecontrole');
            $table->string('probleme');
            $table->string('decision');
            $table->integer('idcampionario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
