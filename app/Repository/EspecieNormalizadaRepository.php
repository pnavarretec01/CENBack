<?php

namespace App\Repository;

use App\Domain\Repository\EspecieNormalizadaInterface;
use App\Models\EspecieNormalizadaDAO;
use Exception;
use Illuminate\Support\Facades\DB;

class EspecieNormalizadaRepository extends EspecieNormalizadaDAO implements EspecieNormalizadaInterface
{

    public function insertarEspecieNormalizada(array $parametro)
    {
        $valor = $parametro['param_descripcion'];
        $idCombustible = $parametro['tico_id'];
        $parametro = new self();
        $parametro->tien_nombre = $valor;
        $parametro->tico_id = $idCombustible;
        $parametro->tien_ind_act = 1;
        $parametro->tico_id = $parametro['tico_id'];
        $parametro->save();

        return $parametro->toArray();
    }

    public function editarEspecieNormalizada(array $parametro)
    {
        $valor = $parametro['form']['param_descripcion'];
        $parametroNuevo = self::where("tien_id", $parametro['id_tupla'])->first();
        $parametroNuevo->tien_nombre = $valor;
        $parametroNuevo->save();

        return $parametroNuevo;
    }

    public function obtenerParametros(int $idCombustible)
    {
        $datos = DB::select('SELECT tien_id AS id, tien_nombre 
                            AS nombre, tien_ind_act AS activo, param_id, param_tabla, param_descripcion 
                            FROM adm_calefaccion.prm_especie_normalizada, adm_calefaccion.prm_parametro_tabla 
                            WHERE prm_parametro_tabla.param_id = 1
                            AND prm_especie_normalizada.tico_id =' . $idCombustible);

        return $datos;
    }

    public function obtenerEspeciePorId(int $id): array
    {
        $tipos = DB::table('prm_especie_normalizada')
            ->where('tico_id', $id)->get();

        return $tipos->toArray();
    }

    public function obtenerEspeciePorIdActiva(int $id): array
    {
        $tipos = DB::table('prm_especie_normalizada')
            ->where('tico_id', $id)
            ->where('tien_ind_act', 1)->get();

        return $tipos->toArray();
    }

    public function obtenerEspeciePorIdEspecie(int $id)
    {
        $tipos = DB::table('prm_especie_normalizada')
            ->where('tien_id', $id)->first();

        return $tipos;
    }

    public function eliminar(int $id, int $combustible)
    {
        $eliminar = self::where("tien_id", $id)->where("tico_id", $combustible)->delete();
        return $eliminar;
    }

    public function habilitarEspecieNormalizada(array $parametro)
    {
        if ($parametro['activo'] === false) {
            $activo = 0;
        } else {
            $activo = 1;
        }
        $parametroNuevo = self::where("tien_id", $parametro['id'])->first();
        $parametroNuevo->tien_ind_act = $activo;

        return $parametroNuevo->save();
    }

    public function validarEspecie($parametro)
    {
        $parametroConfirmar = self::where("tien_nombre", $parametro['param_descripcion'])
            ->where('tico_id', $parametro['tico_id'])->first();
        if (!$parametroConfirmar) return false;

        return true;
    }

    public function validarEspecieEditar($parametro)
    {
        $parametroConfirmar = self::whereNotIn('tien_id', [$parametro['id_tupla']])
            ->where("tien_nombre", $parametro['form']['param_descripcion'])
            ->where('tico_id', $parametro['form']['tico_id'])
            ->first();
        if (!$parametroConfirmar) return false;

        return true;
    }
}
