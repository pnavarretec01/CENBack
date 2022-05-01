<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClfHorarioAtencionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clf_horario_atencion', function (Blueprint $table) {
            $table->integer('hrat_id', true);
            $table->integer('ptv_id')->index('fk_punto_venta_horario');
            $table->time('hrat_lunes_inicio')->nullable();
            $table->time('hrat_lunes_cierre')->nullable();
            $table->time('hrat_martes_inicio')->nullable();
            $table->time('hrat_martes_cierre')->nullable();
            $table->time('hrat_miercoles_inicio')->nullable();
            $table->time('hrat_miercoles_cierre')->nullable();
            $table->time('hrat_jueves_inicio')->nullable();
            $table->time('hrat_jueves_cierre')->nullable();
            $table->time('hrat_viernes_inicio')->nullable();
            $table->time('hrat_viernes_cierre')->nullable();
            $table->time('hrat_sabado_inicio')->nullable();
            $table->time('hrat_sabado_cierre')->nullable();
            $table->time('hrat_domingo_inicio')->nullable();
            $table->time('hrat_domingo_cierre')->nullable();
            $table->time('hrat_festivo_inicio')->nullable();
            $table->time('hrat_festivo_fin')->nullable();
            $table->string('hrat_descripcion_horario')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clf_horario_atencion');
    }
}
