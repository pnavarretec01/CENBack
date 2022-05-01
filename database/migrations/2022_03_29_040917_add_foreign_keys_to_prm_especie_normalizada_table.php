<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPrmEspecieNormalizadaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prm_especie_normalizada', function (Blueprint $table) {
            $table->foreign(['tico_id'], 'tipo_comb_id')->references(['tico_id'])->on('prm_tipo_combustible')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prm_especie_normalizada', function (Blueprint $table) {
            $table->dropForeign('tipo_comb_id');
        });
    }
}
