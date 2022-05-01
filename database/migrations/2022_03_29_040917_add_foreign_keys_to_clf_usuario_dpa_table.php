<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClfUsuarioDpaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clf_usuario_dpa', function (Blueprint $table) {
            $table->foreign(['com_id'], 'fk_usuario_comuna')->references(['com_id'])->on('cut_comuna')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['reg_id'], 'fk_usuario_region')->references(['reg_id'])->on('cut_region')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['usua_id'], 'fk_usuario_dpa')->references(['usua_id'])->on('clf_usuario')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clf_usuario_dpa', function (Blueprint $table) {
            $table->dropForeign('fk_usuario_comuna');
            $table->dropForeign('fk_usuario_region');
            $table->dropForeign('fk_usuario_dpa');
        });
    }
}
