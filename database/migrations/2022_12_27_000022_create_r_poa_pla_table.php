<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRPoaPlaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'r_poa_pla';

    /**
     * Run the migrations.
     * @table r_poa_pla
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('tipo_cliente_pla')->nullable();
            $table->string('tipo_cliente_desc_pla', 45)->nullable();
            $table->string('tratam_normal', 45)->nullable();
            $table->string('tratam_moroso', 45)->nullable();
            $table->string('delegacion', 2)->nullable();
            $table->string('agrupacion', 2)->nullable();
            $table->string('bonificado', 2)->nullable();
            $table->string('socio', 2)->nullable();

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
