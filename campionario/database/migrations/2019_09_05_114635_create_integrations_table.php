<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntegrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('integrations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('type_defaut');
            $table->integer('qte');
            $table->string('cause_defaut');
            $table->date('date_entree');
            $table->date('date_sortie');
            $table->string('season');
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
