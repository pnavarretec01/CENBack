<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PrmTipoDistribucionTableSeeder extends Seeder
{
    
    public function run()
    {
        

        \DB::table('prm_tipo_distribucion')->delete();
        
        \DB::table('prm_tipo_distribucion')->insert(array (
            0 => 
            array (
                'tidi_id' => 1,
                'tidi_nombre' => 'Reparto',
                'tidi_ind_act' => 1,
            ),
            1 => 
            array (
                'tidi_id' => 2,
                'tidi_nombre' => 'Venta en local',
                'tidi_ind_act' => 1,
            ),
            2 => 
            array (
                'tidi_id' => 3,
                'tidi_nombre' => 'Ambos',
                'tidi_ind_act' => 1,
            ),
        ));
        
        
    }
}