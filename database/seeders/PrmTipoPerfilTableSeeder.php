<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PrmTipoPerfilTableSeeder extends Seeder
{

    public function run()
    {
        

        \DB::table('prm_tipo_perfil')->delete();
        
        \DB::table('prm_tipo_perfil')->insert(array (
            0 => 
            array (
                'tipe_id' => 1,
                'tipe_nombre' => 'Administrador',
                'tipe_ind_act' => 1,
            ),
            1 => 
            array (
                'tipe_id' => 2,
                'tipe_nombre' => 'Regional',
                'tipe_ind_act' => 1,
            ),
            2 => 
            array (
                'tipe_id' => 3,
                'tipe_nombre' => 'Observador',
                'tipe_ind_act' => 1,
            ),
            3 => 
            array (
                'tipe_id' => 4,
                'tipe_nombre' => 'Pellet',
                'tipe_ind_act' => 1,
            ),
            4 => 
            array (
                'tipe_id' => 5,
                'tipe_nombre' => 'Leña',
                'tipe_ind_act' => 1,
            ),
            5 => 
            array (
                'tipe_id' => 6,
                'tipe_nombre' => 'Tarifa Eléctrica',
                'tipe_ind_act' => 1,
            ),
        ));
        
        
    }
}