<?php

namespace App\Repository;

use App\Domain\Repository\ConfigurarParametroInterface;
use Exception;
use Illuminate\Support\Facades\DB;

class ConfigurarParametroRepository  implements ConfigurarParametroInterface
{

    public function configurarParametro(array $parametro)
    {
        $tabla = $parametro['parametro']['param_tabla'];
        $valor = $parametro['param_descripcion'];
        if ($tabla == "prm_especie_normalizada") {
            $confParametro = DB::table($tabla)->insert([
                'tien_nombre' => $valor,
                'tien_ind_act' => 1,
            ]);
        } else {
            $confParametro = DB::table($tabla)->insert([
                'tiun_nombre' => $valor,
                'tiun_ind_act' => 1,
            ]);
        }

        return $confParametro;
    }

    public function obtenerParametros(): array
    {
        $paramUnidad = DB::select('SELECT * FROM prm_unidad_normalizada');
        $paramEspecie = DB::select('SELECT * FROM prm_especie_normalizada');
        $resultado = array_merge($paramUnidad, $paramEspecie);
        if (!$resultado) throw new Exception("No se puede obtener los parámetros", 0);

        return $resultado;
    }
}
