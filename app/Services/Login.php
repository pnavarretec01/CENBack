<?php

namespace App\Services;

use App\Domain\Repository\UsuarioInterface;

class LoginService
{
    private $repository;

    public function __construct(UsuarioInterface $correo)
    {
        $this->repository = $correo;
    }

    public function getUsuarioByCorreo(String $correo): Object
    {
        return $this->repository->getUsuarioByCorreo($correo);
    }
}
