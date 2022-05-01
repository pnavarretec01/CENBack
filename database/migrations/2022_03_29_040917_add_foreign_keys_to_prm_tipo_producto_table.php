<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPrmTipoProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prm_tipo_producto', function (Blueprint $table) {
            $table->foreign(['tico_id'], 'id_combustible')->references(['tico_id'])->on('prm_tipo_combustible')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prm_tipo_producto', function (Blueprint $table) {
            $table->dropForeign('id_combustible');
        });
    }
}
