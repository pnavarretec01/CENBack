<?php

namespace App\Services;

use Exception;

use App\Domain\Repository\TarifaElectricaInterface;

class TarifaElectricaService
{
    private $repository;

    public function __construct(TarifaElectricaInterface $pv)
    {
        $this->repository = $pv;
    }

    public function obtenerPuntosVentas(): array
    {
        if (
            Auth()->user()->tipe_id == 1
            || Auth()->user()->tipe_id == 2
            || Auth()->user()->tipe_id == 3
            || Auth()->user()->tipe_id == 4
            || Auth()->user()->tipe_id == 5
            || Auth()->user()->tipe_id == 6
        ) {
            $tarifa = $this->repository->obtenerTarifas();
            $tarifas = [];
            foreach ($tarifa as $item) {
                $item['region'] = $this->repository->obtenerRegionById($item['tari_id']);
                $item['comuna'] = $this->repository->obtenerComunaById($item['tari_id']);
                $tarifas[] = $item;
            }
            if (!$tarifas)
                throw new Exception("La tarifa no existe en nuestros registros", 1);

            return [
                "status" => true,
                "data" => $tarifas,
            ];
        } else {
            throw new Exception("Su usuario no tiene acceso a esta función, favor comuníquese con un Admistrador/a.", 1);
        }
    }

    public function configurarParametro(array $parametro): array
    {
        if ($parametro['parametro']['param_tabla'] === "prm_especie_normalizada") {
            $parametroConf = $this->repositoryEspecie->insertarEspecieNormalizada($parametro);
        } else {
            $parametroConf = $this->repositoryUnidad->insertarUnidadNormalizada($parametro);
        }

        return [
            "status" => true,
            "data" => $parametroConf,
        ];
    }

    public function agregarTarifa(array $tarifa)
    {
        if (Auth()->user()->tipe_id == 1 || Auth()->user()->tipe_id == 6) {
            $tarifaNueva = $this->repository->agregarTarifa($tarifa);

            return [
                "status" => true,
                "data" => $tarifaNueva,
            ];
        } else {
            throw new Exception("Su usuario no tiene acceso a esta función, favor comuníquese con un Admistrador/a.", 1);
        }
    }

    public function habilitartarifa(array $tarifa)
    {
        if (Auth()->user()->tipe_id == 1 || Auth()->user()->tipe_id == 6) {
            $tarifaNuevo = $this->repository->habilitarTarifa($tarifa);

            return [
                "status" => true,
                "data" => $tarifaNuevo,
            ];
        } else {
            throw new Exception("Su usuario no tiene acceso a esta función, favor comuníquese con un Admistrador/a.", 1);
        }
    }

    public function editartarifa(array $tarifa)
    {
        if (Auth()->user()->tipe_id == 1 || Auth()->user()->tipe_id == 6) {
            $tarifaNuevo = $this->repository->editarTarifa($tarifa);

            return [
                "status" => true,
                "data" => $tarifaNuevo,
            ];
        } else {
            throw new Exception("Su usuario no tiene acceso a esta función, favor comuníquese con un Admistrador/a.", 1);
        }
    }


    public function eliminar($data)
    {
        if (Auth()->user()->tipe_id == 1 || Auth()->user()->tipe_id == 6) {
            $id = $data[0];
            $tarifa = $this->repository->eliminar($id);

            return [
                "status" => true,
                "data" => $tarifa
            ];
        } else {
            throw new Exception("Su usuario no tiene acceso a esta función, favor comuníquese con un Admistrador/a.", 1);
        }
    }
}
