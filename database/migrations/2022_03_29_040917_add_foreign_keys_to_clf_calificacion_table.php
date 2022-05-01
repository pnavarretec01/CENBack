<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClfCalificacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clf_calificacion', function (Blueprint $table) {
            $table->foreign(['ptv_id'], 'fk_punto_venta_calificacion')->references(['ptv_id'])->on('clf_punto_venta')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['tpcl_id'], 'fk_tipo_calificacion_punto')->references(['tpcl_id'])->on('prm_tipo_calificacion')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clf_calificacion', function (Blueprint $table) {
            $table->dropForeign('fk_punto_venta_calificacion');
            $table->dropForeign('fk_tipo_calificacion_punto');
        });
    }
}
