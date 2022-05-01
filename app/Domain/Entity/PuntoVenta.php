<?php

namespace App\Domain\Entity;

class PuntoVenta
{
    public $id;
    public $nombre;
    public $region;
    public $comuna;
    public $direccion;
    public $utmEste;
    public $utmNorte;
    public $geolocalizado;
    public $nombreContacto;
    public $telefonoContacto;
    public $correoContacto;
    public $whatsapp;
    public $informacionValida;
    public $observacion;
    public $tipoCombustible;
    public $indicador;
    public $theGeom;
    public function __construct(
        Int $id,
        String $nombre,
        Region $region,
        Comuna $comuna,
        String $direccion,
        float $utmE,
        float $utmN,
        int $geolocalizado,
        String $nombreContacto,
        int $telefonoContacto,
        String $correoContacto,
        String $whatsapp,
        int $informacionValida,
        String $observacion,
        TipoCombustible $tipoCombustible,
        int $indicador,
        String $theGeom
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->region = $region;
        $this->comuna = $comuna;
        $this->direccion = $direccion;
        $this->utmEste = $utmE;
        $this->utmNorte = $utmN;
        $this->geolocalizado = $geolocalizado;
        $this->nombreContacto = $nombreContacto;
        $this->telefonoContacto = $telefonoContacto;
        $this->correoContacto = $correoContacto;
        $this->whatsapp = $whatsapp;
        $this->informacionValida = $informacionValida;
        $this->observacion = $observacion;
        $this->tipoCombustible = $tipoCombustible;
        $this->indicador = $indicador;
        $this->theGeom = $theGeom;
    }
}
