<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClfUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clf_usuario', function (Blueprint $table) {
            $table->integer('usua_id', true);
            $table->string('usua_nombre');
            $table->bigInteger('usua_telefono');
            $table->string('usua_correo');
            $table->integer('tipe_id')->index('fk_tipo_perfil_usua');
            $table->string('usua_clave');
            $table->integer('usua_intento_login');
            $table->boolean('usua_bloqueado');
            $table->integer('usua_ind_act');
            $table->text('usua_token')->nullable();
            $table->string('codigo_recuperacion', 45)->nullable();
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
        Schema::dropIfExists('clf_usuario');
    }
}
