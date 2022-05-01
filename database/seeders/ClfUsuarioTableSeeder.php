<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClfUsuarioTableSeeder extends Seeder
{

    public function run()
    {
        

        \DB::table('clf_usuario')->delete();
        
        \DB::table('clf_usuario')->insert(array (
            0 => 
            array (
                'usua_id' => 1,
                'usua_nombre' => 'Administrador Calefacción',
                'usua_telefono' => 99999999999,
                'usua_correo' => 'infoestadistica@cne.cl',
                'tipe_id' => 1,
                'usua_clave' => '$2y$10$OYhnzvZjySgLqPfJ2gw87u6tBojv2P29LJzEl3sECSIRKVX961hf.',
                'usua_intento_login' => 0,
                'usua_bloqueado' => 0,
                'usua_ind_act' => 1,
                'usua_token' => NULL,
                'codigo_recuperacion' => NULL,
                'created_at' => '2022-03-31 16:16:27',
                'updated_at' => '2022-03-31 16:20:32',
            ),
        ));
        
        
    }
}