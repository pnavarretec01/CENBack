<?php

namespace App\Repository;

use App\Domain\Repository\TarifaElectricaInterface;
use App\Models\TarifaElectricaDAO;
use Exception;
use Illuminate\Support\Facades\DB;

class TarifaElectricaRepository extends TarifaElectricaDAO implements TarifaElectricaInterface
{

    public function obtenerTarifas(): array
    {
        $puntos = self::orderBy('updated_at', 'DESC')->get();
        if (!$puntos) throw new Exception("No se puede obtener las tarifas eléctricas", 0);

        return $puntos->toArray();
    }
    public function obtenerRegionById(Int $id)
    {
        $ubicacion = DB::table('clf_tarifa_electrica')
            ->join('cut_region', 'cut_region.reg_id', 'clf_tarifa_electrica.reg_id')
            ->where('tari_id', $id)->select(
                'cut_region.reg_id',
                'cut_region.reg_id_hml',
                'cut_region.reg_nombre AS nombre',
                'cut_region.reg_orden',
                'cut_region.reg_ind_act'
            )->distinct()->first();

        return $ubicacion;
    }

    public function obtenerComunaById(Int $id)
    {
        $ubicacion = DB::table('clf_tarifa_electrica')
            ->join('cut_comuna', 'cut_comuna.com_id', 'clf_tarifa_electrica.com_id')
            ->where('tari_id', $id)->select(
                'cut_comuna.com_id',
                'cut_comuna.com_id_hml',
                'cut_comuna.com_nombre AS nombre',
                'cut_comuna.reg_id',
                'cut_comuna.com_ind_acti',
            )->distinct()->first();

        return $ubicacion;
    }

    public function agregarTarifa(array $tarifa)
    {
        $idRegion = $tarifa['region']['id'];
        $idComuna = $tarifa['comuna']['id'];
        $tariUrl = $tarifa['beneficio'];
        $tariInfo = $tarifa['informacion'];
        $tariMensaje = $tarifa['mensaje'];
        $tarifaNueva = new self();
        $tarifaNueva->reg_id = $idRegion;
        $tarifaNueva->com_id = $idComuna;
        $tarifaNueva->tari_url = $tariUrl;
        $tarifaNueva->tari_informacion = $tariInfo;
        $tarifaNueva->tari_mensaje = $tariMensaje;
        $tarifaNueva->tari_ind_act = 1;
        $tarifaNueva->save();

        return $tarifaNueva->toArray();
    }

    public function editarTarifa(array $tarifa)
    {
        $idRegion = $tarifa['form']['region']['reg_id'];
        $idComuna = $tarifa['form']['comuna']['com_id'];
        $tariUrl = $tarifa['form']['beneficio'];
        $tariInfo = $tarifa['form']['informacion'];
        $tariMensaje = $tarifa['form']['mensaje'];
        $tarifaNueva = self::where("tari_id", $tarifa['tari_id'])->first();
        $tarifaNueva->reg_id = $idRegion;
        $tarifaNueva->com_id = $idComuna;
        $tarifaNueva->tari_url = $tariUrl;
        $tarifaNueva->tari_informacion = $tariInfo;
        $tarifaNueva->tari_mensaje = $tariMensaje;
        $tarifaNueva->tari_ind_act = 1;
        $tarifaNueva->save();

        return $tarifaNueva->toArray();
    }

    public function habilitarTarifa(array $tarifa)
    {
        if ($tarifa['tari_ind_act'] === false) {
            $activo = 0;
        } else {
            $activo = 1;
        }
        $id = $tarifa['tari_id'];
        $tarifaModificar = self::where("tari_id", $id)->first();
        $tarifaModificar->tari_ind_act = $activo;

        return $tarifaModificar->save();
    }

    public function eliminar(int $id)
    {
        $tarifa = self::where("tari_id", $id)->delete();
        return $tarifa;
    }
}
