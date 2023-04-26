<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTorneosCanTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'torneos_can';

    /**
     * Run the migrations.
     * @table torneos_can
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('can_letra', 45)->nullable();
            $table->integer('can_numero')->nullable();
            $table->string('torneo_codigo', 45)->nullable();
            $table->integer('calendario_codigo')->nullable();
            $table->string('torneo_tipo', 5)->nullable();
            $table->string('prueba_adiestramiento', 45)->nullable();
            $table->integer('categoria')->nullable();
            $table->integer('agrupacion_que_compite')->nullable();
            $table->string('libre', 2)->nullable();
            $table->string('cobrado', 2)->nullable();
            $table->string('guia', 45)->nullable();
            $table->integer('delegacion')->nullable();
            $table->string('pais', 45)->nullable();
            $table->string('it_pelolargo', 2)->nullable();
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
