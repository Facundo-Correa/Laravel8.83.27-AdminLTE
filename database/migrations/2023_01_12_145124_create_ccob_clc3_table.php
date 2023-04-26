<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCcobClc3Table extends Migration
{
    public $tableName = 'ccob_clc3';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ccob_clc3', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('CLC3_CLASIF_3')->nullable();
            $table->string('CLC3_NOMBRE', 255)->nullable();
            $table->integer('CLC3_UTILIZABLE')->nullable();
                        
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
        Schema::dropIfExists('ccob_clc3');
    }
}
