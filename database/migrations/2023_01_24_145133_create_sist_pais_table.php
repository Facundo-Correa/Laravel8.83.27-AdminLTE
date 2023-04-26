<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSistPaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sist_pais', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('PAIS_PAIS')->nullable();
            $table->string('PAIS_NOMBRE')->nullable();
            $table->integer('PAIS_UTILIZABLE')->nullable();
            $table->string('PAIS_COD_PAIS_ONCCA')->nullable();
            $table->string('PAIS_DESTINO_ONCCA')->nullable();
            $table->string('PAIS_COD_PAIS_AFIP')->nullable();
            $table->string('PAIS_ISO_INTERNACIONAL')->nullable();
                        
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
        Schema::dropIfExists('sist_pais');
    }
}
