<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeolocalizacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geolocalizacion', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('parent_id')->nullable();
            $table->string('nombre')->nullable();
            $table->string('abreviatura')->nullable();
            $table->string('codigo_lugar')->nullable();
            $table->string('codigo_zona')->nullable();
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->timestamps();
                        
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
        Schema::dropIfExists('geolocalizacion');
    }
}
