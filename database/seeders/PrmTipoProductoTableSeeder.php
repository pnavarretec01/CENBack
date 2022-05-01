<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PrmTipoProductoTableSeeder extends Seeder
{

    public function run()
    {
      
        \DB::table('prm_tipo_producto')->delete();
        
        \DB::table('prm_tipo_producto')->insert(array (
            0 => 
            array (
                'tipr_id' => 1,
                'tipr_nombre' => 'Leña',
                'tipr_ind_act' => 1,
                'tico_id' => 1,
            ),
            1 => 
            array (
                'tipr_id' => 2,
                'tipr_nombre' => 'Pellet',
                'tipr_ind_act' => 1,
                'tico_id' => 1,
            ),
            2 => 
            array (
                'tipr_id' => 3,
                'tipr_nombre' => 'Briqueta',
                'tipr_ind_act' => 1,
                'tico_id' => 1,
            ),
            3 => 
            array (
                'tipr_id' => 4,
                'tipr_nombre' => 'Pellet',
                'tipr_ind_act' => 1,
                'tico_id' => 2,
            ),
        ));
        
        
    }
}