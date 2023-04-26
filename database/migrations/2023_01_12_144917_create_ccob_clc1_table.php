<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCcobClc1Table extends Migration
{
    public $tableName = 'ccob_clc';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ccob_clc1', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('CLC1_CLASIF_1')->nullable();
            $table->string('CLC1_NOMBRE', 255)->nullable();
            $table->integer('CLC1_UTILIZABLE')->nullable();
            $table->integer('CLC1_HAB_PROM_VOL')->nullable();
                        
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
        Schema::dropIfExists('ccob_clc1');
    }
}
