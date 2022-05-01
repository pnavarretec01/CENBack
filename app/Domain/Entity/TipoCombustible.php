<?php

namespace App\Domain\Entity;

class TipoCombustible
{
    public $id;
    public $descripcion;
    public $indicador;
    public function __construct(Int $id, String $descripcion, Int $indicador)
    {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->indicador = $indicador;
    }
}
