<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrmTipoCalificacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prm_tipo_calificacion', function (Blueprint $table) {
            $table->integer('tpcl_id', true);
            $table->integer('tpcl_cant_estrellas');
            $table->string('tpcl_descripcion');
            $table->integer('tpcl_ind_act');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prm_tipo_calificacion');
    }
}
