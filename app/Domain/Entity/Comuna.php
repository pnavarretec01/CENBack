<?php

namespace App\Domain\Entity;

class Comuna
{
    public $id;
    public $idHml;
    public $nombre;
    public $idRegion;
    public $indicador;
    public function __construct(Int $id, Int $idHml, String $nombre, Int $idRegion, Int $indicador)
    {
        $this->id = $id;
        $this->idHml = $idHml;
        $this->nombre = $nombre;
        $this->idRegion = $idRegion;
        $this->indicador = $indicador;
    }
}
