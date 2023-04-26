<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscripcionTorneosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'inscripcion_torneos';

    /**
     * Run the migrations.
     * @table inscripcion_torneos
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('it_nro_de_control')->nullable();
            $table->string('torneo_codigo', 45)->nullable();
            $table->integer('calendario_codigo')->nullable();
            $table->string('can_letra', 45)->nullable();
            $table->integer('can_numero')->nullable();
            $table->string('torneo_tipo', 45)->nullable();
            $table->integer('categoria')->nullable();
            $table->string('prueba_adiestramiento', 45)->nullable();
            $table->integer('agrupacion_que_compite')->nullable();
            $table->string('libre', 2)->nullable();
            $table->string('cobrado', 2)->nullable();
            $table->date('it_fecha_tramite')->nullable();
            $table->time('it_hora_tramite')->nullable();
            $table->integer('it_datcodusuario')->nullable();
            $table->float('IT_nro_fact')->nullable();
            $table->string('it_concepto_codigo_pla')->nullable();
            $table->float('it_concepto_valor')->nullable();
            $table->integer('it_cliente_cod')->nullable();
            $table->string('it_cliente_tipo_tratamiento', 45)->nullable();
            $table->string('it_documento_pla', 45)->nullable();
            $table->integer('it_cliente_agrup_cod')->nullable();
            $table->string('it_cod_tramite', 45)->nullable();
            $table->string('it_observ', 45)->nullable();
            $table->string('it_imprimi', 45)->nullable();
            $table->string('it_guia', 45)->nullable();
            $table->integer('it_delegacion')->nullable();
            $table->string('it_pais', 45)->nullable();
            $table->string('it_pelolargo', 45)->nullable();
            $table->string('it_origenweb', 45)->nullable();
            $table->string('librenosocio', 45)->nullable();
            $table->string('librefueradezona', 45)->nullable();

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
