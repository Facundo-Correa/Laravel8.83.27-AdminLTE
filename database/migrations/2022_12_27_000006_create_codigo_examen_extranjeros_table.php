<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodigoExamenExtranjerosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'codigo_examen_extranjeros';

    /**
     * Run the migrations.
     * @table codigo_examen_extranjeros
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('examen_cod')->nullable();
            $table->string('examen_desc', 45)->nullable();
            $table->string('examen_pais_cod', 2)->nullable();
            $table->string('examen_aclaraciones', 45)->nullable();
            $table->integer('examen_nivel_ext')->nullable();

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
