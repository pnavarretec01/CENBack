<?php

namespace App\Domain\Repository;

interface ClfProductoInterface
{
    public function obtenerProductosPorId(int $id): array;
    public function agregar(
        $ptv_id,
        $tipr_id,
        $prod_especie,
        $tiun_id,
        $tien_id,
        $prod_unidad,
        $prod_tiene_stock,
        $prod_marca,
        $prod_precio
    );
    public function validar(
        int $ptv_id,
        int $tipr_id,
        string $prod_especie,
        int $tiun_id,
        int $tien_id,
        string $prod_unidad,
        int $prod_tiene_stock,
        string $prod_marca,
        $prod_precio
    );
    public function validarPorId(
        int $prod_id,
        int $ptv_id,
        int $tipr_id,
        string $prod_especie,
        int $tiun_id,
        int $tien_id,
        string $prod_unidad,
        int $prod_tiene_stock,
        string $prod_marca,
        $prod_precio
    );
    public function editar(
        int $prod_id,
        int $ptv_id,
        int $tipr_id,
        string $prod_especie,
        int $tiun_id,
        int $tien_id,
        string $prod_unidad,
        int $prod_tiene_stock,
        $prod_marca,
        $prod_precio
    );
    public function verificaPrecioVacio(int $id);
    public function eliminar(int $id);
    public function eliminarPorPv(int $id);
    public function eliminarPorProducto(int $id, int $combustible, string $tabla);
    public function habilitarProducto(array $producto);
    public function habilitarStock(array $producto);
    public function obtenerProductosPorIdProducto(int $id);
}
