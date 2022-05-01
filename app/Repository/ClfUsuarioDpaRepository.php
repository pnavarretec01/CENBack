<?php

namespace App\Repository;

use App\Domain\Repository\ClfUsuarioDpaInterface;
use App\Models\ClfUsuarioDpaDAO;
use Exception;
use Illuminate\Support\Facades\DB;

class ClfUsuarioDpaRepository extends ClfUsuarioDpaDAO implements ClfUsuarioDpaInterface
{

    public function insertar(int $idUsuario, int $idRegion, int $idComuna): array
    {
        $usuario = new self();
        $usuario->usua_id = $idUsuario;
        $usuario->reg_id = $idRegion;
        $usuario->com_id = $idComuna;
        $usuario->save();

        return $usuario->toArray();
    }

    public function eliminar(int $idUsuario)
    {
        $usuario = self::where("usua_id", $idUsuario)->delete();
        return $usuario;
    }

    public function regionPorUsuario(int $idUsuario)
    {
        $usuario = DB::table('clf_usuario_dpa')
            ->where('usua_id', $idUsuario)->select(
                'com_id'
            )->distinct()->get();

        return $usuario->toArray();
    }
}
