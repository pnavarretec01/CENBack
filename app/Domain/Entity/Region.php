<?php

namespace App\Domain\Entity;

class Region
{
    public $id;
    public $idHml;
    public $nombre;
    public $orden;
    public $indicador;
    public function __construct(Int $id, Int $idHml, String $nombre, Int $orden, Int $indicador)
    {
        $this->id = $id;
        $this->idHml = $idHml;
        $this->nombre = $nombre;
        $this->orden = $orden;
        $this->indicador = $indicador;
    }
}
