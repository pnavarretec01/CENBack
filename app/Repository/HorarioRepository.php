<?php

namespace App\Repository;

use App\Domain\Repository\HorarioInterface;
use App\Models\HorarioDAO;
use Exception;
use Illuminate\Support\Facades\DB;

class HorarioRepository extends HorarioDAO implements HorarioInterface
{

    public function insertarHorario(int $id, array $horario): array
    {
        /**
         * asignacion de horarios por variable recibida de front
         */
        $lunesInicio = $horario['hrat_lunes_inicio'];
        $lunesCierre  = $horario['hrat_lunes_cierre'];
        $martesInicio = $horario['hrat_martes_inicio'];
        $martesCierre = $horario['hrat_martes_cierre'];
        $miercolesInicio = $horario['hrat_miercoles_inicio'];
        $miercolesCierre = $horario['hrat_miercoles_cierre'];
        $juevesInicio = $horario['hrat_jueves_inicio'];
        $juevesCierre = $horario['hrat_jueves_cierre'];
        $viernesInicio = $horario['hrat_viernes_inicio'];
        $viernesCierre = $horario['hrat_viernes_cierre'];
        $sabadoInicio = $horario['hrat_sabado_inicio'];
        $sabadoCierre = $horario['hrat_sabado_cierre'];
        $domingoInicio = $horario['hrat_domingo_inicio'];
        $domingoCierre = $horario['hrat_domingo_cierre'];
        $festivoInicio = $horario['hrat_festivo_inicio'];
        $festivoCierre = $horario['hrat_festivo_cierre'];
        $descripcion = $horario['hrat_descripcion_horario'];

        $horario = new self();
        $horario->ptv_id = $id;
        $horario->hrat_lunes_inicio = $lunesInicio;
        $horario->hrat_lunes_cierre = $lunesCierre;
        $horario->hrat_martes_inicio = $martesInicio;
        $horario->hrat_martes_cierre = $martesCierre;
        $horario->hrat_miercoles_inicio = $miercolesInicio;
        $horario->hrat_miercoles_cierre = $miercolesCierre;
        $horario->hrat_jueves_inicio = $juevesInicio;
        $horario->hrat_jueves_cierre = $juevesCierre;
        $horario->hrat_viernes_inicio = $viernesInicio;
        $horario->hrat_viernes_cierre = $viernesCierre;
        $horario->hrat_sabado_inicio = $sabadoInicio;
        $horario->hrat_sabado_cierre = $sabadoCierre;
        $horario->hrat_domingo_inicio = $domingoInicio;
        $horario->hrat_domingo_cierre = $domingoCierre;
        $horario->hrat_festivo_inicio = $festivoInicio;
        $horario->hrat_festivo_fin = $festivoCierre;
        $horario->hrat_descripcion_horario = $descripcion;
        $horario->save();

        return $horario->toArray();
    }

    public function editarHorario(int $id, array $horario): array
    {
        /**
         * asignacion de horarios por variable recibida de front
         */
        $lunesInicio = $horario['hrat_lunes_inicio'];
        $lunesCierre  = $horario['hrat_lunes_cierre'];
        $martesInicio = $horario['hrat_martes_inicio'];
        $martesCierre = $horario['hrat_martes_cierre'];
        $miercolesInicio = $horario['hrat_miercoles_inicio'];
        $miercolesCierre = $horario['hrat_miercoles_cierre'];
        $juevesInicio = $horario['hrat_jueves_inicio'];
        $juevesCierre = $horario['hrat_jueves_cierre'];
        $viernesInicio = $horario['hrat_viernes_inicio'];
        $viernesCierre = $horario['hrat_viernes_cierre'];
        $sabadoInicio = $horario['hrat_sabado_inicio'];
        $sabadoCierre = $horario['hrat_sabado_cierre'];
        $domingoInicio = $horario['hrat_domingo_inicio'];
        $domingoCierre = $horario['hrat_domingo_cierre'];
        $festivoInicio = $horario['hrat_festivo_inicio'];
        $festivoCierre = $horario['hrat_festivo_cierre'];
        $descripcion = $horario['hrat_descripcion_horario'];

        $horario = self::where("ptv_id", $id)->first();
        $horario->hrat_lunes_inicio = $lunesInicio;
        $horario->hrat_lunes_cierre = $lunesCierre;
        $horario->hrat_martes_inicio = $martesInicio;
        $horario->hrat_martes_cierre = $martesCierre;
        $horario->hrat_miercoles_inicio = $miercolesInicio;
        $horario->hrat_miercoles_cierre = $miercolesCierre;
        $horario->hrat_jueves_inicio = $juevesInicio;
        $horario->hrat_jueves_cierre = $juevesCierre;
        $horario->hrat_viernes_inicio = $viernesInicio;
        $horario->hrat_viernes_cierre = $viernesCierre;
        $horario->hrat_sabado_inicio = $sabadoInicio;
        $horario->hrat_sabado_cierre = $sabadoCierre;
        $horario->hrat_domingo_inicio = $domingoInicio;
        $horario->hrat_domingo_cierre = $domingoCierre;
        $horario->hrat_festivo_inicio = $festivoInicio;
        $horario->hrat_festivo_fin = $festivoCierre;
        $horario->hrat_descripcion_horario = $descripcion;
        $horario->save();

        return $horario->toArray();
    }

    public function validarHorario($id)
    {
        $horario = self::where("ptv_id", $id)->first();
        if ($horario) {

            return true;
        } else {

            return false;
        }
    }
    public function eliminar(int $id)
    {
        $horario = self::where("ptv_id", $id)->delete();
        return $horario;
    }
}
