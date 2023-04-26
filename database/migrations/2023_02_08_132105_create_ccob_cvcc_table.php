<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCcobCvccTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ccob_cvcc', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('CVCC_CTACTE_CTEC')->nullable();
            $table->string('CVCC_DIVISION_CVCL')->nullable();
            $table->string('CVCC_SUCURSAL_CVCL')->nullable();
            $table->string('CVCC_TIPO_CVCL')->nullable();
            $table->string('CVCC_NUMERO_CVCL')->nullable();

            $table->unique(["id"], 'id_UNIQUE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ccob_cvcc');
    }
}
