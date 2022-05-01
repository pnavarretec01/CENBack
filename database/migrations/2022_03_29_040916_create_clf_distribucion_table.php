<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClfDistribucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clf_distribucion', function (Blueprint $table) {
            $table->integer('ptv_id');
            $table->integer('tidi_id')->index('fk_tipo_distribucion_punto_venta');

            $table->primary(['ptv_id', 'tidi_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clf_distribucion');
    }
}
