<?php

namespace App\Services;

use Exception;

use App\Domain\Repository\ReportePrecioAdminInterface;

class ReportePrecioAdminService
{
    private $repository;

    public function __construct(ReportePrecioAdminInterface $pv)
    {
        $this->repository = $pv;
    }

    public function obtenerReportes(): array
    {
        $reportes = $this->repository->obtenerReportes();
        if (!$reportes)
            throw new Exception("La reportes no existe en nuestros registros", 1);

        return [
            "status" => true,
            "data" => $reportes,
        ];
    }

    public function habilitarReporte(array $reporte)
    {
        $reporteNuevo = $this->repository->habilitarReporte($reporte);

        return [
            "status" => true,
            "data" => $reporteNuevo,
        ];
    }
}
