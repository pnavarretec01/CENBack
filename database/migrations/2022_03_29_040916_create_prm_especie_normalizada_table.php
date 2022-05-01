<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrmEspecieNormalizadaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prm_especie_normalizada', function (Blueprint $table) {
            $table->integer('tien_id', true);
            $table->string('tien_nombre');
            $table->integer('tien_ind_act');
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
        Schema::dropIfExists('prm_especie_normalizada');
    }
}
