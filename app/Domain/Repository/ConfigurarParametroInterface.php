<?php

namespace App\Domain\Repository;

interface ConfigurarParametroInterface
{
    public function configurarParametro(array $parametro);
    public function obtenerParametros(): array;
}
