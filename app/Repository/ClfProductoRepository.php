<?php

namespace App\Repository;

use App\Domain\Repository\ClfProductoInterface;
use App\Models\ClfProductoDAO;
use Exception;
use Illuminate\Support\Facades\DB;

class ClfProductoRepository extends ClfProductoDAO implements ClfProductoInterface
{

    public function obtenerProductosPorId(int $id): array
    {
        $productos = DB::table('clf_producto')
            ->where('ptv_id', $id)->get();

        return $productos->toArray();
    }

    public function obtenerProductosPorIdProducto(int $id)
    {
        $productos = DB::table('clf_producto')
            ->where('prod_id', $id)->first();

        return $productos;
    }

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
    ) {
        $producto = new self();
        $producto->ptv_id = $ptv_id;
        $producto->tipr_id = $tipr_id;
        $producto->prod_especie = $prod_especie;
        $producto->tiun_id = $tiun_id;
        $producto->tien_id = $tien_id;
        $producto->prod_unidad = $prod_unidad;
        $producto->prod_tiene_stock = $prod_tiene_stock;
        $producto->prod_marca = $prod_marca;
        $producto->prod_precio = $prod_precio;
        $producto->prod_ind_act = 1;
        $producto->save();

        return $producto->toArray();
    }

    public function validar(
        int $ptv_id,
        int $tipr_id,
        string $prod_especie,
        int $tiun_id,
        int $tien_id,
        string $prod_unidad,
        int $prod_tiene_stock,
        $prod_marca,
        $prod_precio
    ) {
        $validar = self::where("ptv_id", $ptv_id)
            ->where('tipr_id', $tipr_id)
            ->where('prod_especie', $prod_especie)
            ->where('tiun_id', $tiun_id)
            ->where('tien_id', $tien_id)
            ->where('prod_unidad', $prod_unidad)
            ->where('prod_tiene_stock', $prod_tiene_stock)
            ->where('prod_marca', $prod_marca)
            ->first();
        //->where('prod_precio', $prod_precio)
        if ($validar) {
            return true;
        } else {
            return false;
        }
    }

    public function validarPorId(
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
    ) {
        $validar = self::whereNotIn('tien_id', [$prod_id])
            ->where("ptv_id", $ptv_id)
            ->where('tipr_id', $tipr_id)
            ->where('prod_especie', $prod_especie)
            ->where('tiun_id', $tiun_id)
            ->where('tien_id', $tien_id)
            ->where('prod_unidad', $prod_unidad)
            ->where('prod_tiene_stock', $prod_tiene_stock)
            ->where('prod_marca', $prod_marca)
            ->first();
        //->where('prod_precio', $prod_precio)
        if ($validar) {
            return true;
        } else {
            return false;
        }
    }

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
    ) {
        $producto = self::where("prod_id", $prod_id)->first();
        $producto->ptv_id = $ptv_id;
        $producto->tipr_id = $tipr_id;
        $producto->prod_especie = $prod_especie;
        $producto->tiun_id = $tiun_id;
        $producto->tien_id = $tien_id;
        $producto->prod_unidad = $prod_unidad;
        $producto->prod_tiene_stock = $prod_tiene_stock;
        $producto->prod_marca = $prod_marca;
        $producto->prod_precio = $prod_precio;
        $producto->save();

        return $producto->toArray();
    }

    public function verificaPrecioVacio(int $id)
    {
        //comentado por cambio de requerimiento de usuario
        //aca se validaba si los productos tenian precio
        // $valorVacio = DB::table('clf_producto')->where([
        //     ["ptv_id", $id],
        //     ['prod_precio', 0]
        // ])->first();

        /**
         * nueva validacion
         * verificar si algun producto de un punto de venta tiene stock, entonces envia un 1
         * para que se muestre como un ticket validado en la tabla de PV
         */
        $valorVacio = DB::table('clf_producto')->where([
            ["ptv_id", $id],
            ['prod_tiene_stock', 1]
        ])->first();
        $producto = self::where("ptv_id", $id)->first();
        if ($producto) {
            if ($valorVacio) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }
    public function eliminar(int $id)
    {
        $producto = self::where("prod_id", $id)->delete();
        return $producto;
    }
    public function eliminarPorPv(int $id)
    {
        $producto = self::where("ptv_id", $id)->delete();
        return $producto;
    }

    public function eliminarPorProducto(int $id, int $combustible, string $tabla)
    {
        if ($tabla === "prm_especie_normalizada") {
            $eliminar = self::where("tien_id", $id)->delete();
        } else {
            $eliminar = self::where("tiun_id", $id)->delete();
        }

        return $eliminar;
    }

    public function habilitarProducto(array $producto)
    {
        if ($producto['prod_ind_act'] === false) {
            $activo = 0;
        } else {
            $activo = 1;
        }
        $id = $producto['prod_id'];
        $productoModificar = self::where("prod_id", $id)->first();
        $productoModificar->prod_ind_act = $activo;

        return $productoModificar->save();
    }

    public function habilitarStock(array $producto)
    {
        if ($producto['prod_tiene_stock'] === false) {
            $activo = 0;
        } else {
            $activo = 1;
        }
        $id = $producto['prod_id'];
        $productoModificar = self::where("prod_id", $id)->first();
        $productoModificar->prod_tiene_stock = $activo;

        return $productoModificar->save();
    }
}
