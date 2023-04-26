<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstructuraCategoriaPeludoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'estructura_categoria_peludo';

    /**
     * Run the migrations.
     * @table estructura_categoria_peludo
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('codigo_categoria')->nullable();
            $table->string('denominacion', 45)->nullable();
            $table->integer('meses_desde')->nullable();
            $table->integer('meses_hasta')->nullable();
            $table->string('pedigree_obligatorio', 2)->nullable();
            $table->string('sexo', 2)->nullable();
            $table->string('seleccionados', 2)->nullable();

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
