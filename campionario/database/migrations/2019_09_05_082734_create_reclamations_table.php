<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReclamationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('reclamations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('claimed_by');
            $table->string('supplier');
            $table->string('season');
            $table->string('supplier_invoice');
            $table->string('code_accessory');
            $table->string('color');
            $table->string('family');
            $table->string('sfamily');
            $table->date('date_receive');
            $table->float('price');
            $table->integer('quantity');
            $table->float('total_amount');
            $table->float('claimed_accessory');
            $table->integer('garments');
            $table->integer('industrial_unit_cost');
            $table->string('out_of_standard_detected');
            $table->string('QC'); 
            $table->float('total_amount_charged');
            $table->string('required_by');
            $table->string('referred_to_month'); 
            $table->date('claim_issued');
            $table->date('approved_by_supplier');
            $table->string('debit_note');
            $table->string('validation');
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
