<?php

namespace App\Domain\Repository;

interface HorarioInterface
{
    public function insertarHorario(int $id, array $horario): array;
    public function editarHorario(int $id, array $horario): array;
    public function validarHorario($id);
    public function eliminar(int $id);
}
