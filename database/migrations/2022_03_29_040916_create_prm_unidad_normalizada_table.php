<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrmUnidadNormalizadaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prm_unidad_normalizada', function (Blueprint $table) {
            $table->integer('tiun_id', true);
            $table->string('tiun_nombre');
            $table->integer('tiun_ind_act');
            $table->integer('tico_id')->index('tico_id_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prm_unidad_normalizada');
    }
}
