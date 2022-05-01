<?php

namespace App\Repository;

use App\Domain\Repository\TipoPerfilInterface;
use App\Models\TipoPerfilDAO;
use Exception;
use Illuminate\Support\Facades\DB;

class TipoPerfilRepository extends TipoPerfilDAO implements TipoPerfilInterface
{

    public function obtenerTipoPerfil(): array
    {
        $tipos = self::all();

        return $tipos->toArray();
    }
}
