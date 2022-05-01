<?php

namespace App\Repository;

use App\Domain\Repository\MedioPagoInterface;
use App\Models\MedioPagoDAO;
use Exception;
use Illuminate\Support\Facades\DB;

class MedioPagoRepository extends MedioPagoDAO implements MedioPagoInterface
{

    public function obtenerMedioPago(): array
    {
        $medioPago = self::all();
        if (!$medioPago) throw new Exception("No se puede obtener los medios de pago", 0);

        return $medioPago->toArray();
    }
}
