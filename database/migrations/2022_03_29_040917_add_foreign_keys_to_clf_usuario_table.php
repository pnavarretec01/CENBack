<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClfUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clf_usuario', function (Blueprint $table) {
            $table->foreign(['tipe_id'], 'fk_tipo_perfil_usua')->references(['tipe_id'])->on('prm_tipo_perfil')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clf_usuario', function (Blueprint $table) {
            $table->dropForeign('fk_tipo_perfil_usua');
        });
    }
}
