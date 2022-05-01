<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PrmTipoMedioPagoTableSeeder extends Seeder
{
    
    public function run()
    {
        

        \DB::table('prm_tipo_medio_pago')->delete();
        
        \DB::table('prm_tipo_medio_pago')->insert(array (
            0 => 
            array (
                'timp_id' => 1,
                'timp_nombre' => 'Efectivo',
                'timp_ind_act' => 1,
            ),
            1 => 
            array (
                'timp_id' => 2,
                'timp_nombre' => 'Débito',
                'timp_ind_act' => 1,
            ),
            2 => 
            array (
                'timp_id' => 3,
                'timp_nombre' => 'Crédito',
                'timp_ind_act' => 1,
            ),
        ));
        
        
    }
}