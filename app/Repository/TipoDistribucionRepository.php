<?php

namespace App\Repository;

use App\Domain\Repository\TipoDistribucionInterface;
use App\Models\TipoDistribucionDAO;
use Exception;
use Illuminate\Support\Facades\DB;

class TipoDistribucionRepository extends TipoDistribucionDAO implements TipoDistribucionInterface
{

    public function obtenerTipoDistribucion(): array
    {
        $tipos = self::all();
        if (!$tipos) throw new Exception("No se puede obtener los tipos de distribución", 0);

        return $tipos->toArray();
    }
}
