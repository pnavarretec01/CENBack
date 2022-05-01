<?php

namespace App\Repository;

use App\Domain\Repository\UnidadNormalizadaInterface;
use App\Models\UnidadNormalizadaDAO;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class UnidadNormalizadaRepository extends UnidadNormalizadaDAO implements UnidadNormalizadaInterface
{

    public function insertarUnidadNormalizada(array $parametro)
    {
        $valor = $parametro['param_descripcion'];
        $idCombustible = $parametro['tico_id'];
        $parametroNuevo = new self();
        $parametroNuevo->tiun_nombre = $valor;
        $parametroNuevo->tico_id = $idCombustible;
        $parametroNuevo->tiun_ind_act = 1;
        $parametroNuevo->save();

        return $parametroNuevo;
    }

    public function editarUnidadNormalizada(array $parametro)
    {
        $valor = $parametro['form']['param_descripcion'];
        $parametroNuevo = self::where("tiun_id", $parametro['id_tupla'])->first();
        $parametroNuevo->tiun_nombre = $valor;
        $parametroNuevo->save();

        return $parametroNuevo;
    }

    public function obtenerParametros(int $idCombustible)
    {
        $datos = DB::select('SELECT tiun_id AS id, tiun_nombre 
                            AS nombre, tiun_ind_act AS activo, param_id, param_tabla, param_descripcion 
                            FROM adm_calefaccion.prm_unidad_normalizada, adm_calefaccion.prm_parametro_tabla 
                            WHERE prm_parametro_tabla.param_id = 2
                            AND prm_unidad_normalizada.tico_id =' . $idCombustible);

        return $datos;
    }

    public function obtenerUnidadPorId(int $id): array
    {
        $tipos = DB::table('prm_unidad_normalizada')
            ->where('tico_id', $id)->get();

        return $tipos->toArray();
    }
    
    public function obtenerUnidadPorIdActivo(int $id): array
    {
        $tipos = DB::table('prm_unidad_normalizada')
            ->where('tico_id', $id)
            ->where('tiun_ind_act', 1)->get();

        return $tipos->toArray();
    }

    public function obtenerUnidadPorIdUnidad(int $id)
    {
        $tipos = DB::table('prm_unidad_normalizada')
            ->where('tiun_id', $id)->first();

        return $tipos;
    }

    public function eliminar(int $id, int $combustible)
    {
        $eliminar = self::where("tiun_id", $id)->where("tico_id", $combustible)->delete();
        return $eliminar;
    }

    public function habilitarUnidadNormalizada(array $parametro)
    {
        if ($parametro['activo'] === false) {
            $activo = 0;
        } else {
            $activo = 1;
        }
        $parametroNuevo = self::where("tiun_id", $parametro['id'])->first();
        $parametroNuevo->tiun_ind_act = $activo;

        return $parametroNuevo->save();
    }

    public function validarUnidad($parametro)
    {
        $parametroConfirmar = self::where("tiun_nombre", $parametro['param_descripcion'])
            ->where('tico_id', $parametro['tico_id'])->first();
        if (!$parametroConfirmar) return false;

        return true;
    }

    public function validarUnidadEditar($parametro)
    {
        $parametroConfirmar = self::whereNotIn('tiun_id', [$parametro['id_tupla']])
            ->where("tiun_nombre", $parametro['form']['param_descripcion'])
            ->where('tico_id', $parametro['form']['tico_id'])
            ->first();
        if (!$parametroConfirmar) return false;

        return true;
    }
}
