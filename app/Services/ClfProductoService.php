<?php

namespace App\Services;

use Exception;

use App\Domain\Repository\ClfProductoInterface;
use App\Domain\Repository\UnidadNormalizadaInterface;
use App\Domain\Repository\EspecieNormalizadaInterface;
use App\Domain\Repository\TipoProductoInterface;
use App\Domain\Repository\TipoCombustibleInterface;
use App\Domain\Repository\PuntoVentaInterface;

class ClfProductoService
{
    private $repository;
    private $UnidadRepository;
    private $EspecieRepository;
    private $CombustibleRepository;
    private $PuntoVenteRepository;

    public function __construct(
        ClfProductoInterface $pv,
        UnidadNormalizadaInterface $un,
        EspecieNormalizadaInterface $en,
        TipoProductoInterface $tp,
        TipoCombustibleInterface $tc,
        PuntoVentaInterface $Pventa
    ) {
        $this->repository = $pv;
        $this->UnidadRepository = $un;
        $this->EspecieRepository = $en;
        $this->TipoProductoRepository = $tp;
        $this->CombustibleRepository = $tc;
        $this->PuntoVentaRepository = $Pventa;
    }

    public function obtenerProductosPorId(array $data): array
    {
        $productos = $this->repository->obtenerProductosPorId($data['ptv_id']);
        $productos = json_decode(json_encode($productos), true);
        $prod = [];
        foreach ($productos as $producto) {
            $producto['unidadNormalizada'] = $this->UnidadRepository->obtenerUnidadPorIdUnidad($producto['tiun_id']);
            $producto['especieNormalizada'] = $this->EspecieRepository->obtenerEspeciePorIdEspecie($producto['tien_id']);
            $producto['tipoCombustible'] = $this->CombustibleRepository->obtenerCombustiblePorId($producto['especieNormalizada']->tico_id);
            $producto['tipoProducto'] = $this->TipoProductoRepository->obtenerTipoProductoPorIdProducto($producto['tipr_id']);
            $prod[] = $producto;
        }
        if (!$prod)
            throw new Exception("No existes productos en nuestros registros", 1);

        return [
            "status" => true,
            "data" => $prod,
        ];
    }

    public function agregar(array $formulario)
    {
        if (!isset($formulario['prod_precio'])) {
            $precio = 0;
        } else {
            $precio = $formulario['prod_precio'];
        }
        $validar =
            $this->repository->validar(
                $formulario['ptv_id'],
                $formulario['tipr_id'],
                $formulario['prod_especie'],
                $formulario['tiun_id'],
                $formulario['tien_id'],
                $formulario['prod_unidad'],
                $formulario['prod_tiene_stock'],
                $formulario['prod_marca'],
                $precio
            );
        if ($validar && !$formulario['confirmacion']) {
            throw new Exception("Ya existe un producto con estos parámetros", 6000);
        } else {
            $puntoVenta = $this->PuntoVentaRepository->obtenerPuntosVentasPorIdHabilitar(
                $formulario['ptv_id']
            );
            $ind_conserva = $puntoVenta['ptv_ind_act'];
            if ($ind_conserva == 1) {
                $ind = false;
            } else {
                $ind = true;
            }
            if ($ind_conserva == 1) {
                $indCons = true;
            } else {
                $indCons = false;
            }
            $ptv = [
                'ptv_id' => $formulario['ptv_id'],
                'habilitar' => $ind
            ];
            $this->PuntoVentaRepository->habilitarPunto($ptv);
            $ptv_conserva = [
                'ptv_id' => $formulario['ptv_id'],
                'habilitar' => $indCons
            ];
            $this->PuntoVentaRepository->habilitarPunto($ptv_conserva);
            $this->repository->agregar(
                $formulario['ptv_id'],
                $formulario['tipr_id'],
                $formulario['prod_especie'],
                $formulario['tiun_id'],
                $formulario['tien_id'],
                $formulario['prod_unidad'],
                $formulario['prod_tiene_stock'],
                $formulario['prod_marca'],
                $precio
            );

            return [
                "status" => true,
                "data" => $formulario,
            ];
        }
    }

    public function editar(array $formulario)
    {
        $puntoVenta = $this->PuntoVentaRepository->obtenerPuntosVentasPorIdHabilitar(
            $formulario['ptv_id']
        );
        $ind_conserva = $puntoVenta['ptv_ind_act'];
        if ($ind_conserva == 1) {
            $ind = false;
        } else {
            $ind = true;
        }
        if ($ind_conserva == 1) {
            $indCons = true;
        } else {
            $indCons = false;
        }
        $ptv = [
            'ptv_id' => $formulario['ptv_id'],
            'habilitar' => $ind
        ];
        $this->PuntoVentaRepository->habilitarPunto($ptv);
        $ptv_conserva = [
            'ptv_id' => $formulario['ptv_id'],
            'habilitar' => $indCons
        ];
        $this->PuntoVentaRepository->habilitarPunto($ptv_conserva);
        if (!$formulario['prod_precio']) {
            $precio = 0;
        } else {
            $precio = $formulario['prod_precio'];
        }
        $validar =
            $this->repository->validarPorId(
                $formulario['prod_id'],
                $formulario['ptv_id'],
                $formulario['tipr_id'],
                $formulario['prod_especie'],
                $formulario['tiun_id'],
                $formulario['tien_id'],
                $formulario['prod_unidad'],
                $formulario['prod_tiene_stock'],
                $formulario['prod_marca'],
                $precio
            );
        if ($validar && !$formulario['confirmacion']) {
            throw new Exception("Ya existe un producto con estos parámetros", 6000);
        } else {
            $this->repository->editar(
                $formulario['prod_id'],
                $formulario['ptv_id'],
                $formulario['tipr_id'],
                $formulario['prod_especie'],
                $formulario['tiun_id'],
                $formulario['tien_id'],
                $formulario['prod_unidad'],
                $formulario['prod_tiene_stock'],
                $formulario['prod_marca'],
                $precio
            );

            return [
                "status" => true,
                "data" => $formulario,
            ];
        }
    }

    public function eliminar($data)
    {
        $productos = $this->repository->obtenerProductosPorIdProducto($data[0]);
        $puntoVenta = $this->PuntoVentaRepository->obtenerPuntosVentasPorIdHabilitar(
            $productos->ptv_id
        );
        $ind_conserva = $puntoVenta['ptv_ind_act'];
        if ($ind_conserva == 1) {
            $ind = false;
        } else {
            $ind = true;
        }
        if ($ind_conserva == 1) {
            $indCons = true;
        } else {
            $indCons = false;
        }
        $ptv = [
            'ptv_id' => $productos->ptv_id,
            'habilitar' => $ind
        ];
        $this->PuntoVentaRepository->habilitarPunto($ptv);
        $ptv_conserva = [
            'ptv_id' => $productos->ptv_id,
            'habilitar' => $indCons
        ];
        $this->PuntoVentaRepository->habilitarPunto($ptv_conserva);

        $id = $data[0];
        $producto = $this->repository->eliminar($id);

        return [
            "status" => true,
            "data" => $producto
        ];
    }

    public function habilitarProducto(array $producto)
    {
        $puntoNuevo = $this->repository->habilitarProducto($producto);

        return [
            "status" => true,
            "data" => $puntoNuevo,
        ];
    }

    public function habilitarStock(array $producto)
    {
        $puntoVenta = $this->PuntoVentaRepository->obtenerPuntosVentasPorIdHabilitar(
            $producto['ptv_id']
        );
        $ind_conserva = $puntoVenta['ptv_ind_act'];
        if ($ind_conserva == 1) {
            $ind = false;
        } else {
            $ind = true;
        }
        if ($ind_conserva == 1) {
            $indCons = true;
        } else {
            $indCons = false;
        }
        $ptv = [
            'ptv_id' => $producto['ptv_id'],
            'habilitar' => $ind
        ];
        $this->PuntoVentaRepository->habilitarPunto($ptv);
        $ptv_conserva = [
            'ptv_id' => $producto['ptv_id'],
            'habilitar' => $indCons
        ];
        $this->PuntoVentaRepository->habilitarPunto($ptv_conserva);

        $puntoNuevo = $this->repository->habilitarStock($producto);

        return [
            "status" => true,
            "data" => $puntoNuevo,
        ];
    }
}
