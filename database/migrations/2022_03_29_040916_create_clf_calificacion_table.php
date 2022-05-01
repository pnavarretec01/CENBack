<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClfCalificacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clf_calificacion', function (Blueprint $table) {
            $table->integer('cali_id', true);
            $table->integer('ptv_id')->index('fk_punto_venta_calificacion');
            $table->string('cali_nombre_cliente');
            $table->integer('tpcl_id')->index('fk_tipo_calificacion_punto');
            $table->integer('cali_ind_act');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clf_calificacion');
    }
}
