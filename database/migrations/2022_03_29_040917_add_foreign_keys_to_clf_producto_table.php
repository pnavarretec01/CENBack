<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClfProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clf_producto', function (Blueprint $table) {
            $table->foreign(['tien_id'], 'fk_prm_especie_normalizada_id')->references(['tien_id'])->on('prm_especie_normalizada')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['ptv_id'], 'fk_punto_venta_producto')->references(['ptv_id'])->on('clf_punto_venta')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['tiun_id'], 'fk_prm_unidad_normalizada_id')->references(['tiun_id'])->on('prm_unidad_normalizada')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['tipr_id'], 'fk_tipo_producto')->references(['tipr_id'])->on('prm_tipo_producto')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clf_producto', function (Blueprint $table) {
            $table->dropForeign('fk_prm_especie_normalizada_id');
            $table->dropForeign('fk_punto_venta_producto');
            $table->dropForeign('fk_prm_unidad_normalizada_id');
            $table->dropForeign('fk_tipo_producto');
        });
    }
}
