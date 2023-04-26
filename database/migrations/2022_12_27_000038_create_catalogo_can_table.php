<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogoCanTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'catalogo_can';

    /**
     * Run the migrations.
     * @table catalogo_can
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('calendario_nro_control')->nullable();
            $table->string('can_codigo', 10)->nullable();
            $table->integer('can_numero')->nullable();
            $table->string('can_nombre', 45)->nullable();
            $table->string('can_nacimiento', 10)->nullable();
            $table->string('can_nombrep', 45)->nullable();
            $table->string('can_nombrem', 45)->nullable();
            $table->string('can_tatuaje', 45)->nullable();
            $table->integer('datcodusuario')->nullable();
            $table->string('can_nombrecriador', 45)->nullable();
            $table->string('can_expositor', 45)->nullable();
            $table->string('agrupacion', 45)->nullable();
            $table->string('sexo', 1)->nullable();
            $table->integer('categoria')->nullable();
            $table->integer('edad')->nullable();
            $table->integer('catalogo_nro')->nullable();
            $table->string('seleccionado', 45)->nullable();
            $table->string('padre_seleccionado', 2)->nullable();
            $table->string('madre_seleccionada', 2)->nullable();
            $table->string('cab2', 255)->nullable();
            $table->string('placa_dcf', 45)->nullable();
            $table->string('placa_codo', 45)->nullable();
            $table->string('descendencia', 2)->nullable();
            $table->string('calendario_fecha_letras', 45)->nullable();
            $table->integer('prueba_adiestramiento')->nullable();
            $table->string('guia', 45)->nullable();
            $table->string('seleccion', 255)->nullable();
            $table->string('delegacion', 45)->nullable();
            $table->string('peludo', 2)->nullable();
            $table->string('libre', 45)->nullable();
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
