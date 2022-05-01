<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClfUsuarioDpaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clf_usuario_dpa', function (Blueprint $table) {
            $table->integer('usua_id');
            $table->integer('reg_id')->index('fk_usuario_region');
            $table->integer('com_id')->index('fk_usuario_comuna');

            $table->primary(['usua_id', 'reg_id', 'com_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clf_usuario_dpa');
    }
}
