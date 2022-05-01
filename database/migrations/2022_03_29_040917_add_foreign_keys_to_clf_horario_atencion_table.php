<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClfHorarioAtencionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clf_horario_atencion', function (Blueprint $table) {
            $table->foreign(['ptv_id'], 'fk_punto_venta_horario')->references(['ptv_id'])->on('clf_punto_venta')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clf_horario_atencion', function (Blueprint $table) {
            $table->dropForeign('fk_punto_venta_horario');
        });
    }
}
