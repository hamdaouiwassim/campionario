<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('campionarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idaccessoire');
            $table->integer('idfournisseur');
            $table->integer('qte');
            $table->string('numfacture');
            $table->string('user');
            $table->string('saison');
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
