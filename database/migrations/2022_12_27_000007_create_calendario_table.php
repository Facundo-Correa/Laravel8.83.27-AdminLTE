<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'calendario';

    /**
     * Run the migrations.
     * @table calendario
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('torneo_cod')->nullable();
            $table->integer('anio')->nullable();
            $table->integer('nro_de_fecha')->nullable();
            $table->date('fecha_desde')->nullable();
            $table->date('fecha_hasta')->nullable();
            $table->integer('lugar_codigo')->nullable();
            $table->string('provincia_codigo', 2)->nullable();
            $table->string('pais_codigo', 2)->nullable();
            $table->integer('calendario_ide')->nullable();
            $table->string('categoria_codigo', 1)->nullable();
            $table->string('agrupacion_codigo')->nullable();
            $table->integer('delegacion_codigo')->nullable();
            $table->string('torneo_que_suma')->nullable();
            $table->integer('es_ultima_fecha')->nullable();
            $table->integer('tomado')->nullable();
            $table->integer('publicado')->nullable();
            $table->string('fecha_nombre', 45)->nullable();
            $table->string('torneo_es_siegerchau', 2)->nullable();
            $table->integer('torneo_completo')->nullable();
            $table->string('arancelado', 2)->nullable();
            $table->date('fcierre')->nullable();
            $table->integer('cantcuotas')->nullable();

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
        Schema::dropIfExists($this->tableName);
    }
}
