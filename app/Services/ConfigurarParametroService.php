<?php

namespace App\Services;

use App\Domain\Repository\EspecieNormalizadaInterface;
use App\Domain\Repository\UnidadNormalizadaInterface;
use App\Domain\Repository\TipoParametroInterface;
use App\Domain\Repository\ClfProductoInterface;
use Exception;

class ConfigurarParametroService
{
    private $repositoryEspecie;
    private $repositoryUnidad;
    private $repositoryUnidadNormalizadaInterface;
    private $repositoryClfProducto;

    public function __construct(
        EspecieNormalizadaInterface $repositoryEspecie,
        UnidadNormalizadaInterface $repositoryUnidad,
        TipoParametroInterface $repositoryTipoParametro,
        ClfProductoInterface $repositoryClfProducto
    ) {
        $this->repositoryEspecie = $repositoryEspecie;
        $this->repositoryUnidad = $repositoryUnidad;
        $this->repositoryTipoParametro = $repositoryTipoParametro;
        $this->repositoryClfProducto = $repositoryClfProducto;
    }

    public function configurarParametro(array $parametro): array
    {
        if ($parametro['parametro']['param_tabla'] === "prm_especie_normalizada") {
            $verifEspecie = $this->repositoryEspecie->validarEspecie($parametro);
            if ($verifEspecie) {
                throw new Exception("Ya existe un parámetro con este nombre", 1000);
            } else {
                $parametroConf = $this->repositoryEspecie->insertarEspecieNormalizada($parametro);
            }
        } else {
            $verifUnidad = $this->repositoryUnidad->validarUnidad($parametro);
            if ($verifUnidad) {
                throw new Exception("Ya existe un parámetro con este nombre", 1000);
            } else {
                $parametroConf = $this->repositoryUnidad->insertarUnidadNormalizada($parametro);
            }
        }

        return [
            "status" => true,
            "data" => $parametroConf,
        ];
    }

    public function editarParametro(array $parametro): array
    {
        if ($parametro['form']['parametro']['param_tabla'] === "prm_especie_normalizada") {
            $verifEspecie = $this->repositoryEspecie->validarEspecieEditar($parametro);
            if ($verifEspecie) {
                throw new Exception("Ya existe un parámetro con este nombre", 1000);
            } else {
                $parametroConf = $this->repositoryEspecie->editarEspecieNormalizada($parametro);
            }
        } else {
            $verifUnidad = $this->repositoryUnidad->validarUnidadEditar($parametro);
            if ($verifUnidad) {
                throw new Exception("Ya existe un parámetro con este nombre", 1000);
            } else {
                $parametroConf = $this->repositoryUnidad->editarUnidadNormalizada($parametro);
            }
        }

        return [
            "status" => true,
            "data" => $parametroConf,
        ];
    }

    public function obtenerParametros(int $idCombustible): array
    {

        $parametro = array_merge(
            $this->repositoryUnidad->obtenerParametros($idCombustible),
            $this->repositoryEspecie->obtenerParametros($idCombustible)
        );
        $parametros = [];
        foreach ($parametro as $item) {
            $tabla = $item->param_descripcion;
            $parametros['param'] =  $this->repositoryTipoParametro->obtenerTipoParametroPorId($tabla);
        }
        if (!$parametro)
            throw new Exception("El parametro no existe en nuestros registros", 1);

        return [
            "status" => true,
            "data" => $parametro,
        ];
    }

    public function eliminar($data)
    {
        if ($data['tabla'] === "prm_especie_normalizada") {
            $dataConf = $this->repositoryClfProducto->eliminarPorProducto($data['id'], $data['tico_id'], $data['tabla']);
            $dataConf = $this->repositoryEspecie->eliminar($data['id'], $data['tico_id']);
        } else {
            $dataConf = $this->repositoryClfProducto->eliminarPorProducto($data['id'], $data['tico_id'], $data['tabla']);
            $dataConf = $this->repositoryUnidad->eliminar($data['id'], $data['tico_id']);
        }

        return [
            "status" => true,
            "data" => $dataConf,
        ];
    }

    public function habilitar(array $parametro)
    {
        $parametroNuevo = $this->repository->habilitar($parametro);

        return [
            "status" => true,
            "data" => $parametroNuevo,
        ];
    }

    public function habilitarParametro(array $parametro): array
    {
        if ($parametro['param_tabla'] === "prm_especie_normalizada") {
            $parametroConf = $this->repositoryEspecie->habilitarEspecieNormalizada($parametro);
        } else {
            $parametroConf = $this->repositoryUnidad->habilitarUnidadNormalizada($parametro);
        }

        return [
            "status" => true,
            "data" => $parametroConf,
        ];
    }
}
