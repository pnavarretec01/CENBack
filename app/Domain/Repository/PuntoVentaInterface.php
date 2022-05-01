<?php

namespace App\Domain\Repository;

interface PuntoVentaInterface
{
    public function obtenerPuntosVentas(): array;
    public function obtenerPuntosVentasPorId(Int $id): array;
    public function obtenerPuntosVentasPorIdHabilitar(Int $id): array;
    public function obtenerRegionById(Int $id);
    public function obtenerComunaById(Int $id);
    public function guardarPuntoVenta(array $formulario);
    public function obtenerHorariosById(Int $id);
    public function obtenerDistribucionById(Int $id);
    public function obtenerMedioPagoById(Int $id);
    public function editarPuntoVenta(array $formulario);
    public function habilitarPunto(array $reporte);
    public function obtenerPuntosVentasPorPtvId(Int $id): array;
    public function eliminar(int $id);
    public function obtenerPuntosVentasPorIdUsuario(Int $id, $regiones): array;
    public function guardarImagenPuntoVenta(String $urlImagen, Int $ptv_id, String $nombre);
    public function editarImagenPuntoVenta(String $urlImagen, Int $ptv_id, String $nombre);
    public function validar(int $idCombustible, string $direccion);
    public function validarEditar(int $id,int $idCombustible, string $direccion);
}
