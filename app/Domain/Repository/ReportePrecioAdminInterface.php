<?php

namespace App\Domain\Repository;

interface ReportePrecioAdminInterface
{
    public function obtenerReportes() : array;
    public function habilitarReporte(array $reporte);
}
