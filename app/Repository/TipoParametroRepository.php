<?php

namespace App\Repository;

use App\Domain\Repository\TipoParametroInterface;
use App\Models\TipoParametroDAO;
use Exception;
use Illuminate\Support\Facades\DB;

class TipoParametroRepository extends TipoParametroDAO implements TipoParametroInterface
{

    public function obtenerTipoParametro(): array
    {
        $tipos = self::all();
        if (!$tipos) throw new Exception("No se puede obtener los tipos parámetros", 0);

        return $tipos->toArray();
    }

    public function obtenerTipoParametroPorId(string $tabla): array
    {
        $tipos = DB::table('prm_parametro_tabla')
            ->where("param_descripcion", $tabla)->get();

        return $tipos->toArray();
    }
}
