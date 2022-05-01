<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CutComunaTableSeeder extends Seeder
{
    
    public function run()
    {
        

        \DB::table('cut_comuna')->delete();
        
        \DB::table('cut_comuna')->insert(array (
            0 => 
            array (
                'com_id' => 1101,
                'com_id_hml' => '01101',
                'com_nombre' => 'Iquique',
                'reg_id' => 1,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            1 => 
            array (
                'com_id' => 1107,
                'com_id_hml' => '01107',
                'com_nombre' => 'Alto Hospicio',
                'reg_id' => 1,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            2 => 
            array (
                'com_id' => 1401,
                'com_id_hml' => '01401',
                'com_nombre' => 'Pozo Almonte',
                'reg_id' => 1,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            3 => 
            array (
                'com_id' => 1402,
                'com_id_hml' => '01402',
                'com_nombre' => 'Camiña',
                'reg_id' => 1,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            4 => 
            array (
                'com_id' => 1403,
                'com_id_hml' => '01403',
                'com_nombre' => 'Colchane',
                'reg_id' => 1,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            5 => 
            array (
                'com_id' => 1404,
                'com_id_hml' => '01404',
                'com_nombre' => 'Huara',
                'reg_id' => 1,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            6 => 
            array (
                'com_id' => 1405,
                'com_id_hml' => '01405',
                'com_nombre' => 'Pica',
                'reg_id' => 1,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            7 => 
            array (
                'com_id' => 2101,
                'com_id_hml' => '02101',
                'com_nombre' => 'Antofagasta',
                'reg_id' => 2,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            8 => 
            array (
                'com_id' => 2102,
                'com_id_hml' => '02102',
                'com_nombre' => 'Mejillones',
                'reg_id' => 2,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            9 => 
            array (
                'com_id' => 2103,
                'com_id_hml' => '02103',
                'com_nombre' => 'Sierra Gorda',
                'reg_id' => 2,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            10 => 
            array (
                'com_id' => 2104,
                'com_id_hml' => '02104',
                'com_nombre' => 'Taltal',
                'reg_id' => 2,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            11 => 
            array (
                'com_id' => 2201,
                'com_id_hml' => '02201',
                'com_nombre' => 'Calama',
                'reg_id' => 2,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            12 => 
            array (
                'com_id' => 2202,
                'com_id_hml' => '02202',
                'com_nombre' => 'Ollagüe',
                'reg_id' => 2,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            13 => 
            array (
                'com_id' => 2203,
                'com_id_hml' => '02203',
                'com_nombre' => 'San Pedro de Atacama',
                'reg_id' => 2,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            14 => 
            array (
                'com_id' => 2301,
                'com_id_hml' => '02301',
                'com_nombre' => 'Tocopilla',
                'reg_id' => 2,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            15 => 
            array (
                'com_id' => 2302,
                'com_id_hml' => '02302',
                'com_nombre' => 'María Elena',
                'reg_id' => 2,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            16 => 
            array (
                'com_id' => 3101,
                'com_id_hml' => '03101',
                'com_nombre' => 'Copiapó',
                'reg_id' => 3,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            17 => 
            array (
                'com_id' => 3102,
                'com_id_hml' => '03102',
                'com_nombre' => 'Caldera',
                'reg_id' => 3,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            18 => 
            array (
                'com_id' => 3103,
                'com_id_hml' => '03103',
                'com_nombre' => 'Tierra Amarilla',
                'reg_id' => 3,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            19 => 
            array (
                'com_id' => 3201,
                'com_id_hml' => '03201',
                'com_nombre' => 'Chañaral',
                'reg_id' => 3,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            20 => 
            array (
                'com_id' => 3202,
                'com_id_hml' => '03202',
                'com_nombre' => 'Diego de Almagro',
                'reg_id' => 3,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            21 => 
            array (
                'com_id' => 3301,
                'com_id_hml' => '03301',
                'com_nombre' => 'Vallenar',
                'reg_id' => 3,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            22 => 
            array (
                'com_id' => 3302,
                'com_id_hml' => '03302',
                'com_nombre' => 'Alto del Carmen',
                'reg_id' => 3,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            23 => 
            array (
                'com_id' => 3303,
                'com_id_hml' => '03303',
                'com_nombre' => 'Freirina',
                'reg_id' => 3,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            24 => 
            array (
                'com_id' => 3304,
                'com_id_hml' => '03304',
                'com_nombre' => 'Huasco',
                'reg_id' => 3,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            25 => 
            array (
                'com_id' => 4101,
                'com_id_hml' => '04101',
                'com_nombre' => 'La Serena',
                'reg_id' => 4,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            26 => 
            array (
                'com_id' => 4102,
                'com_id_hml' => '04102',
                'com_nombre' => 'Coquimbo',
                'reg_id' => 4,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            27 => 
            array (
                'com_id' => 4103,
                'com_id_hml' => '04103',
                'com_nombre' => 'Andacollo',
                'reg_id' => 4,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            28 => 
            array (
                'com_id' => 4104,
                'com_id_hml' => '04104',
                'com_nombre' => 'La Higuera',
                'reg_id' => 4,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            29 => 
            array (
                'com_id' => 4105,
                'com_id_hml' => '04105',
                'com_nombre' => 'Paiguano',
                'reg_id' => 4,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            30 => 
            array (
                'com_id' => 4106,
                'com_id_hml' => '04106',
                'com_nombre' => 'Vicuña',
                'reg_id' => 4,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            31 => 
            array (
                'com_id' => 4201,
                'com_id_hml' => '04201',
                'com_nombre' => 'Illapel',
                'reg_id' => 4,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            32 => 
            array (
                'com_id' => 4202,
                'com_id_hml' => '04202',
                'com_nombre' => 'Canela',
                'reg_id' => 4,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            33 => 
            array (
                'com_id' => 4203,
                'com_id_hml' => '04203',
                'com_nombre' => 'Los Vilos',
                'reg_id' => 4,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            34 => 
            array (
                'com_id' => 4204,
                'com_id_hml' => '04204',
                'com_nombre' => 'Salamanca',
                'reg_id' => 4,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            35 => 
            array (
                'com_id' => 4301,
                'com_id_hml' => '04301',
                'com_nombre' => 'Ovalle',
                'reg_id' => 4,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            36 => 
            array (
                'com_id' => 4302,
                'com_id_hml' => '04302',
                'com_nombre' => 'Combarbalá',
                'reg_id' => 4,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            37 => 
            array (
                'com_id' => 4303,
                'com_id_hml' => '04303',
                'com_nombre' => 'Monte Patria',
                'reg_id' => 4,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            38 => 
            array (
                'com_id' => 4304,
                'com_id_hml' => '04304',
                'com_nombre' => 'Punitaqui',
                'reg_id' => 4,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            39 => 
            array (
                'com_id' => 4305,
                'com_id_hml' => '04305',
                'com_nombre' => 'Río Hurtado',
                'reg_id' => 4,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            40 => 
            array (
                'com_id' => 5101,
                'com_id_hml' => '05101',
                'com_nombre' => 'Valparaíso',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            41 => 
            array (
                'com_id' => 5102,
                'com_id_hml' => '05102',
                'com_nombre' => 'Casablanca',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            42 => 
            array (
                'com_id' => 5103,
                'com_id_hml' => '05103',
                'com_nombre' => 'Concón',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            43 => 
            array (
                'com_id' => 5104,
                'com_id_hml' => '05104',
                'com_nombre' => 'Juan Fernández',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            44 => 
            array (
                'com_id' => 5105,
                'com_id_hml' => '05105',
                'com_nombre' => 'Puchuncaví',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            45 => 
            array (
                'com_id' => 5107,
                'com_id_hml' => '05107',
                'com_nombre' => 'Quintero',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            46 => 
            array (
                'com_id' => 5109,
                'com_id_hml' => '05109',
                'com_nombre' => 'Viña del Mar',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            47 => 
            array (
                'com_id' => 5201,
                'com_id_hml' => '05201',
                'com_nombre' => 'Isla de Pascua',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            48 => 
            array (
                'com_id' => 5301,
                'com_id_hml' => '05301',
                'com_nombre' => 'Los Andes',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            49 => 
            array (
                'com_id' => 5302,
                'com_id_hml' => '05302',
                'com_nombre' => 'Calle Larga',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            50 => 
            array (
                'com_id' => 5303,
                'com_id_hml' => '05303',
                'com_nombre' => 'Rinconada',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            51 => 
            array (
                'com_id' => 5304,
                'com_id_hml' => '05304',
                'com_nombre' => 'San Esteban',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            52 => 
            array (
                'com_id' => 5401,
                'com_id_hml' => '05401',
                'com_nombre' => 'La Ligua',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            53 => 
            array (
                'com_id' => 5402,
                'com_id_hml' => '05402',
                'com_nombre' => 'Cabildo',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            54 => 
            array (
                'com_id' => 5403,
                'com_id_hml' => '05403',
                'com_nombre' => 'Papudo',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            55 => 
            array (
                'com_id' => 5404,
                'com_id_hml' => '05404',
                'com_nombre' => 'Petorca',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            56 => 
            array (
                'com_id' => 5405,
                'com_id_hml' => '05405',
                'com_nombre' => 'Zapallar',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            57 => 
            array (
                'com_id' => 5501,
                'com_id_hml' => '05501',
                'com_nombre' => 'Quillota',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            58 => 
            array (
                'com_id' => 5502,
                'com_id_hml' => '05502',
                'com_nombre' => 'Calera',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            59 => 
            array (
                'com_id' => 5503,
                'com_id_hml' => '05503',
                'com_nombre' => 'Hijuelas',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            60 => 
            array (
                'com_id' => 5504,
                'com_id_hml' => '05504',
                'com_nombre' => 'La Cruz',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            61 => 
            array (
                'com_id' => 5506,
                'com_id_hml' => '05506',
                'com_nombre' => 'Nogales',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            62 => 
            array (
                'com_id' => 5601,
                'com_id_hml' => '05601',
                'com_nombre' => 'San Antonio',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            63 => 
            array (
                'com_id' => 5602,
                'com_id_hml' => '05602',
                'com_nombre' => 'Algarrobo',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            64 => 
            array (
                'com_id' => 5603,
                'com_id_hml' => '05603',
                'com_nombre' => 'Cartagena',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            65 => 
            array (
                'com_id' => 5604,
                'com_id_hml' => '05604',
                'com_nombre' => 'El Quisco',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            66 => 
            array (
                'com_id' => 5605,
                'com_id_hml' => '05605',
                'com_nombre' => 'El Tabo',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            67 => 
            array (
                'com_id' => 5606,
                'com_id_hml' => '05606',
                'com_nombre' => 'Santo Domingo',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            68 => 
            array (
                'com_id' => 5701,
                'com_id_hml' => '05701',
                'com_nombre' => 'San Felipe',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            69 => 
            array (
                'com_id' => 5702,
                'com_id_hml' => '05702',
                'com_nombre' => 'Catemu',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            70 => 
            array (
                'com_id' => 5703,
                'com_id_hml' => '05703',
                'com_nombre' => 'Llaillay',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            71 => 
            array (
                'com_id' => 5704,
                'com_id_hml' => '05704',
                'com_nombre' => 'Panquehue',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            72 => 
            array (
                'com_id' => 5705,
                'com_id_hml' => '05705',
                'com_nombre' => 'Putaendo',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            73 => 
            array (
                'com_id' => 5706,
                'com_id_hml' => '05706',
                'com_nombre' => 'Santa María',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            74 => 
            array (
                'com_id' => 5801,
                'com_id_hml' => '05801',
                'com_nombre' => 'Quilpué',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            75 => 
            array (
                'com_id' => 5802,
                'com_id_hml' => '05802',
                'com_nombre' => 'Limache',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            76 => 
            array (
                'com_id' => 5803,
                'com_id_hml' => '05803',
                'com_nombre' => 'Olmué',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            77 => 
            array (
                'com_id' => 5804,
                'com_id_hml' => '05804',
                'com_nombre' => 'Villa Alemana',
                'reg_id' => 5,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            78 => 
            array (
                'com_id' => 6101,
                'com_id_hml' => '06101',
                'com_nombre' => 'Rancagua',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            79 => 
            array (
                'com_id' => 6102,
                'com_id_hml' => '06102',
                'com_nombre' => 'Codegua',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            80 => 
            array (
                'com_id' => 6103,
                'com_id_hml' => '06103',
                'com_nombre' => 'Coinco',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            81 => 
            array (
                'com_id' => 6104,
                'com_id_hml' => '06104',
                'com_nombre' => 'Coltauco',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            82 => 
            array (
                'com_id' => 6105,
                'com_id_hml' => '06105',
                'com_nombre' => 'Doñihue',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            83 => 
            array (
                'com_id' => 6106,
                'com_id_hml' => '06106',
                'com_nombre' => 'Graneros',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            84 => 
            array (
                'com_id' => 6107,
                'com_id_hml' => '06107',
                'com_nombre' => 'Las Cabras',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            85 => 
            array (
                'com_id' => 6108,
                'com_id_hml' => '06108',
                'com_nombre' => 'Machalí',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            86 => 
            array (
                'com_id' => 6109,
                'com_id_hml' => '06109',
                'com_nombre' => 'Malloa',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            87 => 
            array (
                'com_id' => 6110,
                'com_id_hml' => '06110',
                'com_nombre' => 'Mostazal',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            88 => 
            array (
                'com_id' => 6111,
                'com_id_hml' => '06111',
                'com_nombre' => 'Olivar',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            89 => 
            array (
                'com_id' => 6112,
                'com_id_hml' => '06112',
                'com_nombre' => 'Peumo',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            90 => 
            array (
                'com_id' => 6113,
                'com_id_hml' => '06113',
                'com_nombre' => 'Pichidegua',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            91 => 
            array (
                'com_id' => 6114,
                'com_id_hml' => '06114',
                'com_nombre' => 'Quinta de Tilcoco',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            92 => 
            array (
                'com_id' => 6115,
                'com_id_hml' => '06115',
                'com_nombre' => 'Rengo',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            93 => 
            array (
                'com_id' => 6116,
                'com_id_hml' => '06116',
                'com_nombre' => 'Requínoa',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            94 => 
            array (
                'com_id' => 6117,
                'com_id_hml' => '06117',
                'com_nombre' => 'San Vicente',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            95 => 
            array (
                'com_id' => 6201,
                'com_id_hml' => '06201',
                'com_nombre' => 'Pichilemu',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            96 => 
            array (
                'com_id' => 6202,
                'com_id_hml' => '06202',
                'com_nombre' => 'La Estrella',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            97 => 
            array (
                'com_id' => 6203,
                'com_id_hml' => '06203',
                'com_nombre' => 'Litueche',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            98 => 
            array (
                'com_id' => 6204,
                'com_id_hml' => '06204',
                'com_nombre' => 'Marchihue',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            99 => 
            array (
                'com_id' => 6205,
                'com_id_hml' => '06205',
                'com_nombre' => 'Navidad',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            100 => 
            array (
                'com_id' => 6206,
                'com_id_hml' => '06206',
                'com_nombre' => 'Paredones',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            101 => 
            array (
                'com_id' => 6301,
                'com_id_hml' => '06301',
                'com_nombre' => 'San Fernando',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            102 => 
            array (
                'com_id' => 6302,
                'com_id_hml' => '06302',
                'com_nombre' => 'Chépica',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            103 => 
            array (
                'com_id' => 6303,
                'com_id_hml' => '06303',
                'com_nombre' => 'Chimbarongo',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            104 => 
            array (
                'com_id' => 6304,
                'com_id_hml' => '06304',
                'com_nombre' => 'Lolol',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            105 => 
            array (
                'com_id' => 6305,
                'com_id_hml' => '06305',
                'com_nombre' => 'Nancagua',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            106 => 
            array (
                'com_id' => 6306,
                'com_id_hml' => '06306',
                'com_nombre' => 'Palmilla',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            107 => 
            array (
                'com_id' => 6307,
                'com_id_hml' => '06307',
                'com_nombre' => 'Peralillo',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            108 => 
            array (
                'com_id' => 6308,
                'com_id_hml' => '06308',
                'com_nombre' => 'Placilla',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            109 => 
            array (
                'com_id' => 6309,
                'com_id_hml' => '06309',
                'com_nombre' => 'Pumanque',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            110 => 
            array (
                'com_id' => 6310,
                'com_id_hml' => '06310',
                'com_nombre' => 'Santa Cruz',
                'reg_id' => 6,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            111 => 
            array (
                'com_id' => 7101,
                'com_id_hml' => '07101',
                'com_nombre' => 'Talca',
                'reg_id' => 7,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            112 => 
            array (
                'com_id' => 7102,
                'com_id_hml' => '07102',
                'com_nombre' => 'Constitución',
                'reg_id' => 7,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            113 => 
            array (
                'com_id' => 7103,
                'com_id_hml' => '07103',
                'com_nombre' => 'Curepto',
                'reg_id' => 7,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            114 => 
            array (
                'com_id' => 7104,
                'com_id_hml' => '07104',
                'com_nombre' => 'Empedrado',
                'reg_id' => 7,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            115 => 
            array (
                'com_id' => 7105,
                'com_id_hml' => '07105',
                'com_nombre' => 'Maule',
                'reg_id' => 7,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            116 => 
            array (
                'com_id' => 7106,
                'com_id_hml' => '07106',
                'com_nombre' => 'Pelarco',
                'reg_id' => 7,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            117 => 
            array (
                'com_id' => 7107,
                'com_id_hml' => '07107',
                'com_nombre' => 'Pencahue',
                'reg_id' => 7,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            118 => 
            array (
                'com_id' => 7108,
                'com_id_hml' => '07108',
                'com_nombre' => 'Río Claro',
                'reg_id' => 7,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            119 => 
            array (
                'com_id' => 7109,
                'com_id_hml' => '07109',
                'com_nombre' => 'San Clemente',
                'reg_id' => 7,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            120 => 
            array (
                'com_id' => 7110,
                'com_id_hml' => '07110',
                'com_nombre' => 'San Rafael',
                'reg_id' => 7,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            121 => 
            array (
                'com_id' => 7201,
                'com_id_hml' => '07201',
                'com_nombre' => 'Cauquenes',
                'reg_id' => 7,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            122 => 
            array (
                'com_id' => 7202,
                'com_id_hml' => '07202',
                'com_nombre' => 'Chanco',
                'reg_id' => 7,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            123 => 
            array (
                'com_id' => 7203,
                'com_id_hml' => '07203',
                'com_nombre' => 'Pelluhue',
                'reg_id' => 7,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            124 => 
            array (
                'com_id' => 7301,
                'com_id_hml' => '07301',
                'com_nombre' => 'Curicó',
                'reg_id' => 7,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            125 => 
            array (
                'com_id' => 7302,
                'com_id_hml' => '07302',
                'com_nombre' => 'Hualañé',
                'reg_id' => 7,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            126 => 
            array (
                'com_id' => 7303,
                'com_id_hml' => '07303',
                'com_nombre' => 'Licantén',
                'reg_id' => 7,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            127 => 
            array (
                'com_id' => 7304,
                'com_id_hml' => '07304',
                'com_nombre' => 'Molina',
                'reg_id' => 7,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            128 => 
            array (
                'com_id' => 7305,
                'com_id_hml' => '07305',
                'com_nombre' => 'Rauco',
                'reg_id' => 7,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            129 => 
            array (
                'com_id' => 7306,
                'com_id_hml' => '07306',
                'com_nombre' => 'Romeral',
                'reg_id' => 7,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            130 => 
            array (
                'com_id' => 7307,
                'com_id_hml' => '07307',
                'com_nombre' => 'Sagrada Familia',
                'reg_id' => 7,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            131 => 
            array (
                'com_id' => 7308,
                'com_id_hml' => '07308',
                'com_nombre' => 'Teno',
                'reg_id' => 7,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            132 => 
            array (
                'com_id' => 7309,
                'com_id_hml' => '07309',
                'com_nombre' => 'Vichuquén',
                'reg_id' => 7,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            133 => 
            array (
                'com_id' => 7401,
                'com_id_hml' => '07401',
                'com_nombre' => 'Linares',
                'reg_id' => 7,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            134 => 
            array (
                'com_id' => 7402,
                'com_id_hml' => '07402',
                'com_nombre' => 'Colbún',
                'reg_id' => 7,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            135 => 
            array (
                'com_id' => 7403,
                'com_id_hml' => '07403',
                'com_nombre' => 'Longaví',
                'reg_id' => 7,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            136 => 
            array (
                'com_id' => 7404,
                'com_id_hml' => '07404',
                'com_nombre' => 'Parral',
                'reg_id' => 7,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            137 => 
            array (
                'com_id' => 7405,
                'com_id_hml' => '07405',
                'com_nombre' => 'Retiro',
                'reg_id' => 7,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            138 => 
            array (
                'com_id' => 7406,
                'com_id_hml' => '07406',
                'com_nombre' => 'San Javier',
                'reg_id' => 7,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            139 => 
            array (
                'com_id' => 7407,
                'com_id_hml' => '07407',
                'com_nombre' => 'Villa Alegre',
                'reg_id' => 7,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            140 => 
            array (
                'com_id' => 7408,
                'com_id_hml' => '07408',
                'com_nombre' => 'Yerbas Buenas',
                'reg_id' => 7,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            141 => 
            array (
                'com_id' => 8101,
                'com_id_hml' => '08101',
                'com_nombre' => 'Concepción',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            142 => 
            array (
                'com_id' => 8102,
                'com_id_hml' => '08102',
                'com_nombre' => 'Coronel',
                'reg_id' => 8,
                'com_ind_acti' => 0,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 05:05:09',
            ),
            143 => 
            array (
                'com_id' => 8103,
                'com_id_hml' => '08103',
                'com_nombre' => 'Chiguayante',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            144 => 
            array (
                'com_id' => 8104,
                'com_id_hml' => '08104',
                'com_nombre' => 'Florida',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            145 => 
            array (
                'com_id' => 8105,
                'com_id_hml' => '08105',
                'com_nombre' => 'Hualqui',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            146 => 
            array (
                'com_id' => 8106,
                'com_id_hml' => '08106',
                'com_nombre' => 'Lota',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            147 => 
            array (
                'com_id' => 8107,
                'com_id_hml' => '08107',
                'com_nombre' => 'Penco',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            148 => 
            array (
                'com_id' => 8108,
                'com_id_hml' => '08108',
                'com_nombre' => 'San Pedro de la Paz',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            149 => 
            array (
                'com_id' => 8109,
                'com_id_hml' => '08109',
                'com_nombre' => 'Santa Juana',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            150 => 
            array (
                'com_id' => 8110,
                'com_id_hml' => '08110',
                'com_nombre' => 'Talcahuano',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            151 => 
            array (
                'com_id' => 8111,
                'com_id_hml' => '08111',
                'com_nombre' => 'Tomé',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            152 => 
            array (
                'com_id' => 8112,
                'com_id_hml' => '08112',
                'com_nombre' => 'Hualpén',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            153 => 
            array (
                'com_id' => 8201,
                'com_id_hml' => '08201',
                'com_nombre' => 'Lebu',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            154 => 
            array (
                'com_id' => 8202,
                'com_id_hml' => '08202',
                'com_nombre' => 'Arauco',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            155 => 
            array (
                'com_id' => 8203,
                'com_id_hml' => '08203',
                'com_nombre' => 'Cañete',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            156 => 
            array (
                'com_id' => 8204,
                'com_id_hml' => '08204',
                'com_nombre' => 'Contulmo',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            157 => 
            array (
                'com_id' => 8205,
                'com_id_hml' => '08205',
                'com_nombre' => 'Curanilahue',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            158 => 
            array (
                'com_id' => 8206,
                'com_id_hml' => '08206',
                'com_nombre' => 'Los Alamos',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            159 => 
            array (
                'com_id' => 8207,
                'com_id_hml' => '08207',
                'com_nombre' => 'Tirúa',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            160 => 
            array (
                'com_id' => 8301,
                'com_id_hml' => '08301',
                'com_nombre' => 'Los Angeles',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            161 => 
            array (
                'com_id' => 8302,
                'com_id_hml' => '08302',
                'com_nombre' => 'Antuco',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            162 => 
            array (
                'com_id' => 8303,
                'com_id_hml' => '08303',
                'com_nombre' => 'Cabrero',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            163 => 
            array (
                'com_id' => 8304,
                'com_id_hml' => '08304',
                'com_nombre' => 'Laja',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            164 => 
            array (
                'com_id' => 8305,
                'com_id_hml' => '08305',
                'com_nombre' => 'Mulchén',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            165 => 
            array (
                'com_id' => 8306,
                'com_id_hml' => '08306',
                'com_nombre' => 'Nacimiento',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            166 => 
            array (
                'com_id' => 8307,
                'com_id_hml' => '08307',
                'com_nombre' => 'Negrete',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            167 => 
            array (
                'com_id' => 8308,
                'com_id_hml' => '08308',
                'com_nombre' => 'Quilaco',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            168 => 
            array (
                'com_id' => 8309,
                'com_id_hml' => '08309',
                'com_nombre' => 'Quilleco',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            169 => 
            array (
                'com_id' => 8310,
                'com_id_hml' => '08310',
                'com_nombre' => 'San Rosendo',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            170 => 
            array (
                'com_id' => 8311,
                'com_id_hml' => '08311',
                'com_nombre' => 'Santa Bárbara',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            171 => 
            array (
                'com_id' => 8312,
                'com_id_hml' => '08312',
                'com_nombre' => 'Tucapel',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            172 => 
            array (
                'com_id' => 8313,
                'com_id_hml' => '08313',
                'com_nombre' => 'Yumbel',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            173 => 
            array (
                'com_id' => 8314,
                'com_id_hml' => '08314',
                'com_nombre' => 'Alto Biobío',
                'reg_id' => 8,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            174 => 
            array (
                'com_id' => 9101,
                'com_id_hml' => '09101',
                'com_nombre' => 'Temuco',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            175 => 
            array (
                'com_id' => 9102,
                'com_id_hml' => '09102',
                'com_nombre' => 'Carahue',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            176 => 
            array (
                'com_id' => 9103,
                'com_id_hml' => '09103',
                'com_nombre' => 'Cunco',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            177 => 
            array (
                'com_id' => 9104,
                'com_id_hml' => '09104',
                'com_nombre' => 'Curarrehue',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            178 => 
            array (
                'com_id' => 9105,
                'com_id_hml' => '09105',
                'com_nombre' => 'Freire',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            179 => 
            array (
                'com_id' => 9106,
                'com_id_hml' => '09106',
                'com_nombre' => 'Galvarino',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            180 => 
            array (
                'com_id' => 9107,
                'com_id_hml' => '09107',
                'com_nombre' => 'Gorbea',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            181 => 
            array (
                'com_id' => 9108,
                'com_id_hml' => '09108',
                'com_nombre' => 'Lautaro',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            182 => 
            array (
                'com_id' => 9109,
                'com_id_hml' => '09109',
                'com_nombre' => 'Loncoche',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            183 => 
            array (
                'com_id' => 9110,
                'com_id_hml' => '09110',
                'com_nombre' => 'Melipeuco',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            184 => 
            array (
                'com_id' => 9111,
                'com_id_hml' => '09111',
                'com_nombre' => 'Nueva Imperial',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            185 => 
            array (
                'com_id' => 9112,
                'com_id_hml' => '09112',
                'com_nombre' => 'Padre Las Casas',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            186 => 
            array (
                'com_id' => 9113,
                'com_id_hml' => '09113',
                'com_nombre' => 'Perquenco',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            187 => 
            array (
                'com_id' => 9114,
                'com_id_hml' => '09114',
                'com_nombre' => 'Pitrufquén',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            188 => 
            array (
                'com_id' => 9115,
                'com_id_hml' => '09115',
                'com_nombre' => 'Pucón',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            189 => 
            array (
                'com_id' => 9116,
                'com_id_hml' => '09116',
                'com_nombre' => 'Saavedra',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            190 => 
            array (
                'com_id' => 9117,
                'com_id_hml' => '09117',
                'com_nombre' => 'Teodoro Schmidt',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            191 => 
            array (
                'com_id' => 9118,
                'com_id_hml' => '09118',
                'com_nombre' => 'Toltén',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            192 => 
            array (
                'com_id' => 9119,
                'com_id_hml' => '09119',
                'com_nombre' => 'Vilcún',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            193 => 
            array (
                'com_id' => 9120,
                'com_id_hml' => '09120',
                'com_nombre' => 'Villarrica',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            194 => 
            array (
                'com_id' => 9121,
                'com_id_hml' => '09121',
                'com_nombre' => 'Cholchol',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            195 => 
            array (
                'com_id' => 9201,
                'com_id_hml' => '09201',
                'com_nombre' => 'Angol',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            196 => 
            array (
                'com_id' => 9202,
                'com_id_hml' => '09202',
                'com_nombre' => 'Collipulli',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            197 => 
            array (
                'com_id' => 9203,
                'com_id_hml' => '09203',
                'com_nombre' => 'Curacautín',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            198 => 
            array (
                'com_id' => 9204,
                'com_id_hml' => '09204',
                'com_nombre' => 'Ercilla',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            199 => 
            array (
                'com_id' => 9205,
                'com_id_hml' => '09205',
                'com_nombre' => 'Lonquimay',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            200 => 
            array (
                'com_id' => 9206,
                'com_id_hml' => '09206',
                'com_nombre' => 'Los Sauces',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            201 => 
            array (
                'com_id' => 9207,
                'com_id_hml' => '09207',
                'com_nombre' => 'Lumaco',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            202 => 
            array (
                'com_id' => 9208,
                'com_id_hml' => '09208',
                'com_nombre' => 'Purén',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            203 => 
            array (
                'com_id' => 9209,
                'com_id_hml' => '09209',
                'com_nombre' => 'Renaico',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            204 => 
            array (
                'com_id' => 9210,
                'com_id_hml' => '09210',
                'com_nombre' => 'Traiguén',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            205 => 
            array (
                'com_id' => 9211,
                'com_id_hml' => '09211',
                'com_nombre' => 'Victoria',
                'reg_id' => 9,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            206 => 
            array (
                'com_id' => 10101,
                'com_id_hml' => '10101',
                'com_nombre' => 'Puerto Montt',
                'reg_id' => 10,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            207 => 
            array (
                'com_id' => 10102,
                'com_id_hml' => '10102',
                'com_nombre' => 'Calbuco',
                'reg_id' => 10,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            208 => 
            array (
                'com_id' => 10103,
                'com_id_hml' => '10103',
                'com_nombre' => 'Cochamó',
                'reg_id' => 10,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            209 => 
            array (
                'com_id' => 10104,
                'com_id_hml' => '10104',
                'com_nombre' => 'Fresia',
                'reg_id' => 10,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            210 => 
            array (
                'com_id' => 10105,
                'com_id_hml' => '10105',
                'com_nombre' => 'Frutillar',
                'reg_id' => 10,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            211 => 
            array (
                'com_id' => 10106,
                'com_id_hml' => '10106',
                'com_nombre' => 'Los Muermos',
                'reg_id' => 10,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            212 => 
            array (
                'com_id' => 10107,
                'com_id_hml' => '10107',
                'com_nombre' => 'Llanquihue',
                'reg_id' => 10,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            213 => 
            array (
                'com_id' => 10108,
                'com_id_hml' => '10108',
                'com_nombre' => 'Maullín',
                'reg_id' => 10,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            214 => 
            array (
                'com_id' => 10109,
                'com_id_hml' => '10109',
                'com_nombre' => 'Puerto Varas',
                'reg_id' => 10,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            215 => 
            array (
                'com_id' => 10201,
                'com_id_hml' => '10201',
                'com_nombre' => 'Castro',
                'reg_id' => 10,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            216 => 
            array (
                'com_id' => 10202,
                'com_id_hml' => '10202',
                'com_nombre' => 'Ancud',
                'reg_id' => 10,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            217 => 
            array (
                'com_id' => 10203,
                'com_id_hml' => '10203',
                'com_nombre' => 'Chonchi',
                'reg_id' => 10,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            218 => 
            array (
                'com_id' => 10204,
                'com_id_hml' => '10204',
                'com_nombre' => 'Curaco de Vélez',
                'reg_id' => 10,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            219 => 
            array (
                'com_id' => 10205,
                'com_id_hml' => '10205',
                'com_nombre' => 'Dalcahue',
                'reg_id' => 10,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            220 => 
            array (
                'com_id' => 10206,
                'com_id_hml' => '10206',
                'com_nombre' => 'Puqueldón',
                'reg_id' => 10,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            221 => 
            array (
                'com_id' => 10207,
                'com_id_hml' => '10207',
                'com_nombre' => 'Queilén',
                'reg_id' => 10,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            222 => 
            array (
                'com_id' => 10208,
                'com_id_hml' => '10208',
                'com_nombre' => 'Quellón',
                'reg_id' => 10,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            223 => 
            array (
                'com_id' => 10209,
                'com_id_hml' => '10209',
                'com_nombre' => 'Quemchi',
                'reg_id' => 10,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            224 => 
            array (
                'com_id' => 10210,
                'com_id_hml' => '10210',
                'com_nombre' => 'Quinchao',
                'reg_id' => 10,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            225 => 
            array (
                'com_id' => 10301,
                'com_id_hml' => '10301',
                'com_nombre' => 'Osorno',
                'reg_id' => 10,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            226 => 
            array (
                'com_id' => 10302,
                'com_id_hml' => '10302',
                'com_nombre' => 'Puerto Octay',
                'reg_id' => 10,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            227 => 
            array (
                'com_id' => 10303,
                'com_id_hml' => '10303',
                'com_nombre' => 'Purranque',
                'reg_id' => 10,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            228 => 
            array (
                'com_id' => 10304,
                'com_id_hml' => '10304',
                'com_nombre' => 'Puyehue',
                'reg_id' => 10,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            229 => 
            array (
                'com_id' => 10305,
                'com_id_hml' => '10305',
                'com_nombre' => 'Río Negro',
                'reg_id' => 10,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            230 => 
            array (
                'com_id' => 10306,
                'com_id_hml' => '10306',
                'com_nombre' => 'San Juan de la Costa',
                'reg_id' => 10,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            231 => 
            array (
                'com_id' => 10307,
                'com_id_hml' => '10307',
                'com_nombre' => 'San Pablo',
                'reg_id' => 10,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            232 => 
            array (
                'com_id' => 10401,
                'com_id_hml' => '10401',
                'com_nombre' => 'Chaitén',
                'reg_id' => 10,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            233 => 
            array (
                'com_id' => 10402,
                'com_id_hml' => '10402',
                'com_nombre' => 'Futaleufú',
                'reg_id' => 10,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            234 => 
            array (
                'com_id' => 10403,
                'com_id_hml' => '10403',
                'com_nombre' => 'Hualaihué',
                'reg_id' => 10,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            235 => 
            array (
                'com_id' => 10404,
                'com_id_hml' => '10404',
                'com_nombre' => 'Palena',
                'reg_id' => 10,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            236 => 
            array (
                'com_id' => 11101,
                'com_id_hml' => '11101',
                'com_nombre' => 'Coihaique',
                'reg_id' => 11,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            237 => 
            array (
                'com_id' => 11102,
                'com_id_hml' => '11102',
                'com_nombre' => 'Lago Verde',
                'reg_id' => 11,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            238 => 
            array (
                'com_id' => 11201,
                'com_id_hml' => '11201',
                'com_nombre' => 'Aisén',
                'reg_id' => 11,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            239 => 
            array (
                'com_id' => 11202,
                'com_id_hml' => '11202',
                'com_nombre' => 'Cisnes',
                'reg_id' => 11,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            240 => 
            array (
                'com_id' => 11203,
                'com_id_hml' => '11203',
                'com_nombre' => 'Guaitecas',
                'reg_id' => 11,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            241 => 
            array (
                'com_id' => 11301,
                'com_id_hml' => '11301',
                'com_nombre' => 'Cochrane',
                'reg_id' => 11,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            242 => 
            array (
                'com_id' => 11302,
                'com_id_hml' => '11302',
                'com_nombre' => 'O\'Higgins',
                'reg_id' => 11,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            243 => 
            array (
                'com_id' => 11303,
                'com_id_hml' => '11303',
                'com_nombre' => 'Tortel',
                'reg_id' => 11,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            244 => 
            array (
                'com_id' => 11401,
                'com_id_hml' => '11401',
                'com_nombre' => 'Chile Chico',
                'reg_id' => 11,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            245 => 
            array (
                'com_id' => 11402,
                'com_id_hml' => '11402',
                'com_nombre' => 'Río Ibáñez',
                'reg_id' => 11,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            246 => 
            array (
                'com_id' => 12101,
                'com_id_hml' => '12101',
                'com_nombre' => 'Punta Arenas',
                'reg_id' => 12,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            247 => 
            array (
                'com_id' => 12102,
                'com_id_hml' => '12102',
                'com_nombre' => 'Laguna Blanca',
                'reg_id' => 12,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            248 => 
            array (
                'com_id' => 12103,
                'com_id_hml' => '12103',
                'com_nombre' => 'Río Verde',
                'reg_id' => 12,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            249 => 
            array (
                'com_id' => 12104,
                'com_id_hml' => '12104',
                'com_nombre' => 'San Gregorio',
                'reg_id' => 12,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            250 => 
            array (
                'com_id' => 12201,
                'com_id_hml' => '12201',
                'com_nombre' => 'Cabo de Hornos',
                'reg_id' => 12,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            251 => 
            array (
                'com_id' => 12301,
                'com_id_hml' => '12301',
                'com_nombre' => 'Porvenir',
                'reg_id' => 12,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            252 => 
            array (
                'com_id' => 12302,
                'com_id_hml' => '12302',
                'com_nombre' => 'Primavera',
                'reg_id' => 12,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            253 => 
            array (
                'com_id' => 12303,
                'com_id_hml' => '12303',
                'com_nombre' => 'Timaukel',
                'reg_id' => 12,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            254 => 
            array (
                'com_id' => 12401,
                'com_id_hml' => '12401',
                'com_nombre' => 'Natales',
                'reg_id' => 12,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            255 => 
            array (
                'com_id' => 12402,
                'com_id_hml' => '12402',
                'com_nombre' => 'Torres del Paine',
                'reg_id' => 12,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            256 => 
            array (
                'com_id' => 13101,
                'com_id_hml' => '13101',
                'com_nombre' => 'Santiago',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            257 => 
            array (
                'com_id' => 13102,
                'com_id_hml' => '13102',
                'com_nombre' => 'Cerrillos',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            258 => 
            array (
                'com_id' => 13103,
                'com_id_hml' => '13103',
                'com_nombre' => 'Cerro Navia',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            259 => 
            array (
                'com_id' => 13104,
                'com_id_hml' => '13104',
                'com_nombre' => 'Conchalí',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            260 => 
            array (
                'com_id' => 13105,
                'com_id_hml' => '13105',
                'com_nombre' => 'El Bosque',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            261 => 
            array (
                'com_id' => 13106,
                'com_id_hml' => '13106',
                'com_nombre' => 'Estación Central',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            262 => 
            array (
                'com_id' => 13107,
                'com_id_hml' => '13107',
                'com_nombre' => 'Huechuraba',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            263 => 
            array (
                'com_id' => 13108,
                'com_id_hml' => '13108',
                'com_nombre' => 'Independencia',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            264 => 
            array (
                'com_id' => 13109,
                'com_id_hml' => '13109',
                'com_nombre' => 'La Cisterna',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            265 => 
            array (
                'com_id' => 13110,
                'com_id_hml' => '13110',
                'com_nombre' => 'La Florida',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            266 => 
            array (
                'com_id' => 13111,
                'com_id_hml' => '13111',
                'com_nombre' => 'La Granja',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            267 => 
            array (
                'com_id' => 13112,
                'com_id_hml' => '13112',
                'com_nombre' => 'La Pintana',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            268 => 
            array (
                'com_id' => 13113,
                'com_id_hml' => '13113',
                'com_nombre' => 'La Reina',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            269 => 
            array (
                'com_id' => 13114,
                'com_id_hml' => '13114',
                'com_nombre' => 'Las Condes',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            270 => 
            array (
                'com_id' => 13115,
                'com_id_hml' => '13115',
                'com_nombre' => 'Lo Barnechea',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            271 => 
            array (
                'com_id' => 13116,
                'com_id_hml' => '13116',
                'com_nombre' => 'Lo Espejo',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            272 => 
            array (
                'com_id' => 13117,
                'com_id_hml' => '13117',
                'com_nombre' => 'Lo Prado',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            273 => 
            array (
                'com_id' => 13118,
                'com_id_hml' => '13118',
                'com_nombre' => 'Macul',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            274 => 
            array (
                'com_id' => 13119,
                'com_id_hml' => '13119',
                'com_nombre' => 'Maipú',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            275 => 
            array (
                'com_id' => 13120,
                'com_id_hml' => '13120',
                'com_nombre' => 'Ñuñoa',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            276 => 
            array (
                'com_id' => 13121,
                'com_id_hml' => '13121',
                'com_nombre' => 'Pedro Aguirre Cerda',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            277 => 
            array (
                'com_id' => 13122,
                'com_id_hml' => '13122',
                'com_nombre' => 'Peñalolén',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            278 => 
            array (
                'com_id' => 13123,
                'com_id_hml' => '13123',
                'com_nombre' => 'Providencia',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            279 => 
            array (
                'com_id' => 13124,
                'com_id_hml' => '13124',
                'com_nombre' => 'Pudahuel',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            280 => 
            array (
                'com_id' => 13125,
                'com_id_hml' => '13125',
                'com_nombre' => 'Quilicura',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            281 => 
            array (
                'com_id' => 13126,
                'com_id_hml' => '13126',
                'com_nombre' => 'Quinta Normal',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            282 => 
            array (
                'com_id' => 13127,
                'com_id_hml' => '13127',
                'com_nombre' => 'Recoleta',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            283 => 
            array (
                'com_id' => 13128,
                'com_id_hml' => '13128',
                'com_nombre' => 'Renca',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            284 => 
            array (
                'com_id' => 13129,
                'com_id_hml' => '13129',
                'com_nombre' => 'San Joaquín',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            285 => 
            array (
                'com_id' => 13130,
                'com_id_hml' => '13130',
                'com_nombre' => 'San Miguel',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            286 => 
            array (
                'com_id' => 13131,
                'com_id_hml' => '13131',
                'com_nombre' => 'San Ramón',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            287 => 
            array (
                'com_id' => 13132,
                'com_id_hml' => '13132',
                'com_nombre' => 'Vitacura',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            288 => 
            array (
                'com_id' => 13201,
                'com_id_hml' => '13201',
                'com_nombre' => 'Puente Alto',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            289 => 
            array (
                'com_id' => 13202,
                'com_id_hml' => '13202',
                'com_nombre' => 'Pirque',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            290 => 
            array (
                'com_id' => 13203,
                'com_id_hml' => '13203',
                'com_nombre' => 'San José de Maipo',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            291 => 
            array (
                'com_id' => 13301,
                'com_id_hml' => '13301',
                'com_nombre' => 'Colina',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            292 => 
            array (
                'com_id' => 13302,
                'com_id_hml' => '13302',
                'com_nombre' => 'Lampa',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            293 => 
            array (
                'com_id' => 13303,
                'com_id_hml' => '13303',
                'com_nombre' => 'Tiltil',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            294 => 
            array (
                'com_id' => 13401,
                'com_id_hml' => '13401',
                'com_nombre' => 'San Bernardo',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            295 => 
            array (
                'com_id' => 13402,
                'com_id_hml' => '13402',
                'com_nombre' => 'Buin',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            296 => 
            array (
                'com_id' => 13403,
                'com_id_hml' => '13403',
                'com_nombre' => 'Calera de Tango',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            297 => 
            array (
                'com_id' => 13404,
                'com_id_hml' => '13404',
                'com_nombre' => 'Paine',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            298 => 
            array (
                'com_id' => 13501,
                'com_id_hml' => '13501',
                'com_nombre' => 'Melipilla',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            299 => 
            array (
                'com_id' => 13502,
                'com_id_hml' => '13502',
                'com_nombre' => 'Alhué',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            300 => 
            array (
                'com_id' => 13503,
                'com_id_hml' => '13503',
                'com_nombre' => 'Curacaví',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            301 => 
            array (
                'com_id' => 13504,
                'com_id_hml' => '13504',
                'com_nombre' => 'María Pinto',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            302 => 
            array (
                'com_id' => 13505,
                'com_id_hml' => '13505',
                'com_nombre' => 'San Pedro',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            303 => 
            array (
                'com_id' => 13601,
                'com_id_hml' => '13601',
                'com_nombre' => 'Talagante',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            304 => 
            array (
                'com_id' => 13602,
                'com_id_hml' => '13602',
                'com_nombre' => 'El Monte',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            305 => 
            array (
                'com_id' => 13603,
                'com_id_hml' => '13603',
                'com_nombre' => 'Isla de Maipo',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            306 => 
            array (
                'com_id' => 13604,
                'com_id_hml' => '13604',
                'com_nombre' => 'Padre Hurtado',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            307 => 
            array (
                'com_id' => 13605,
                'com_id_hml' => '13605',
                'com_nombre' => 'Peñaflor',
                'reg_id' => 13,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            308 => 
            array (
                'com_id' => 14101,
                'com_id_hml' => '14101',
                'com_nombre' => 'Valdivia',
                'reg_id' => 14,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            309 => 
            array (
                'com_id' => 14102,
                'com_id_hml' => '14102',
                'com_nombre' => 'Corral',
                'reg_id' => 14,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            310 => 
            array (
                'com_id' => 14103,
                'com_id_hml' => '14103',
                'com_nombre' => 'Lanco',
                'reg_id' => 14,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            311 => 
            array (
                'com_id' => 14104,
                'com_id_hml' => '14104',
                'com_nombre' => 'Los Lagos',
                'reg_id' => 14,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            312 => 
            array (
                'com_id' => 14105,
                'com_id_hml' => '14105',
                'com_nombre' => 'Máfil',
                'reg_id' => 14,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            313 => 
            array (
                'com_id' => 14106,
                'com_id_hml' => '14106',
                'com_nombre' => 'Mariquina',
                'reg_id' => 14,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            314 => 
            array (
                'com_id' => 14107,
                'com_id_hml' => '14107',
                'com_nombre' => 'Paillaco',
                'reg_id' => 14,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            315 => 
            array (
                'com_id' => 14108,
                'com_id_hml' => '14108',
                'com_nombre' => 'Panguipulli',
                'reg_id' => 14,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            316 => 
            array (
                'com_id' => 14201,
                'com_id_hml' => '14201',
                'com_nombre' => 'La Unión',
                'reg_id' => 14,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            317 => 
            array (
                'com_id' => 14202,
                'com_id_hml' => '14202',
                'com_nombre' => 'Futrono',
                'reg_id' => 14,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            318 => 
            array (
                'com_id' => 14203,
                'com_id_hml' => '14203',
                'com_nombre' => 'Lago Ranco',
                'reg_id' => 14,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            319 => 
            array (
                'com_id' => 14204,
                'com_id_hml' => '14204',
                'com_nombre' => 'Río Bueno',
                'reg_id' => 14,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            320 => 
            array (
                'com_id' => 15101,
                'com_id_hml' => '15101',
                'com_nombre' => 'Arica',
                'reg_id' => 15,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            321 => 
            array (
                'com_id' => 15102,
                'com_id_hml' => '15102',
                'com_nombre' => 'Camarones',
                'reg_id' => 15,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            322 => 
            array (
                'com_id' => 15201,
                'com_id_hml' => '15201',
                'com_nombre' => 'Putre',
                'reg_id' => 15,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            323 => 
            array (
                'com_id' => 15202,
                'com_id_hml' => '15202',
                'com_nombre' => 'General Lagos',
                'reg_id' => 15,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            324 => 
            array (
                'com_id' => 16101,
                'com_id_hml' => '16101',
                'com_nombre' => 'Chillán',
                'reg_id' => 16,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            325 => 
            array (
                'com_id' => 16102,
                'com_id_hml' => '16102',
                'com_nombre' => 'Bulnes',
                'reg_id' => 16,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            326 => 
            array (
                'com_id' => 16103,
                'com_id_hml' => '16103',
                'com_nombre' => 'Chillán Viejo',
                'reg_id' => 16,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            327 => 
            array (
                'com_id' => 16104,
                'com_id_hml' => '16104',
                'com_nombre' => 'El Carmen',
                'reg_id' => 16,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            328 => 
            array (
                'com_id' => 16105,
                'com_id_hml' => '16105',
                'com_nombre' => 'Pemuco',
                'reg_id' => 16,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            329 => 
            array (
                'com_id' => 16106,
                'com_id_hml' => '16106',
                'com_nombre' => 'Pinto',
                'reg_id' => 16,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            330 => 
            array (
                'com_id' => 16107,
                'com_id_hml' => '16107',
                'com_nombre' => 'Quillón',
                'reg_id' => 16,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            331 => 
            array (
                'com_id' => 16108,
                'com_id_hml' => '16108',
                'com_nombre' => 'San Ignacio',
                'reg_id' => 16,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            332 => 
            array (
                'com_id' => 16109,
                'com_id_hml' => '16109',
                'com_nombre' => 'Yungay',
                'reg_id' => 16,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            333 => 
            array (
                'com_id' => 16201,
                'com_id_hml' => '16201',
                'com_nombre' => 'Quirihue',
                'reg_id' => 16,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            334 => 
            array (
                'com_id' => 16202,
                'com_id_hml' => '16202',
                'com_nombre' => 'Cobquecura',
                'reg_id' => 16,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            335 => 
            array (
                'com_id' => 16203,
                'com_id_hml' => '16203',
                'com_nombre' => 'Coelemu',
                'reg_id' => 16,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            336 => 
            array (
                'com_id' => 16204,
                'com_id_hml' => '16204',
                'com_nombre' => 'Ninhue',
                'reg_id' => 16,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            337 => 
            array (
                'com_id' => 16205,
                'com_id_hml' => '16205',
                'com_nombre' => 'Portezuelo',
                'reg_id' => 16,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            338 => 
            array (
                'com_id' => 16206,
                'com_id_hml' => '16206',
                'com_nombre' => 'Ranquil',
                'reg_id' => 16,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            339 => 
            array (
                'com_id' => 16207,
                'com_id_hml' => '16207',
                'com_nombre' => 'Treguaco',
                'reg_id' => 16,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            340 => 
            array (
                'com_id' => 16301,
                'com_id_hml' => '16301',
                'com_nombre' => 'San Carlos',
                'reg_id' => 16,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            341 => 
            array (
                'com_id' => 16302,
                'com_id_hml' => '16302',
                'com_nombre' => 'Coihueco',
                'reg_id' => 16,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            342 => 
            array (
                'com_id' => 16303,
                'com_id_hml' => '16303',
                'com_nombre' => 'Ñiquén',
                'reg_id' => 16,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            343 => 
            array (
                'com_id' => 16304,
                'com_id_hml' => '16304',
                'com_nombre' => 'San Fabián',
                'reg_id' => 16,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
            344 => 
            array (
                'com_id' => 16305,
                'com_id_hml' => '16305',
                'com_nombre' => 'San Nicolás',
                'reg_id' => 16,
                'com_ind_acti' => 1,
                'created_at' => '2022-03-03 18:16:48',
                'updated_at' => '2022-03-29 03:46:08',
            ),
        ));
        
        
    }
}