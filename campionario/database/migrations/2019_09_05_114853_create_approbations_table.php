<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprobationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
            Schema::create('approbations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('color');
            $table->integer('num_echentient');
            $table->integer('fournisseur');
            $table->date('date');
            $table->string('decision');
            $table->string('note');
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
