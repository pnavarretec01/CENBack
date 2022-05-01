<?php

namespace App\Repository;

use App\Domain\Repository\PuntoVentaInterface;
use App\Models\PuntoVentaDAO;
use Exception;
use Illuminate\Support\Facades\DB;

class PuntoVentaRepository extends PuntoVentaDAO implements PuntoVentaInterface
{

    public function obtenerPuntosVentas(): array
    {
        $puntos = self::orderBy('updated_at', 'DESC')->get();
        if (!$puntos) throw new Exception("No se puede obtener los puntos de venta", 0);

        return $puntos->toArray();
    }

    public function obtenerPuntosVentasPorId(Int $id): array
    {
        $puntos = self::orderBy('updated_at', 'DESC')->where("tico_id", $id)->get();
        if (!$puntos) throw new Exception("El punto de venta no se encuentra en nuestros registros", 0);

        return $puntos->toArray();
    }
    public function obtenerPuntosVentasPorIdHabilitar(Int $id): array
    {
        $puntos = self::where("ptv_id", $id)->first();
        if (!$puntos) throw new Exception("El punto de venta no se encuentra en nuestros registros", 0);

        return $puntos->toArray();
    }

    public function obtenerPuntosVentasPorIdUsuario(Int $id, $regiones): array
    {
        $puntos = self::where("tico_id", $id)->where("com_id", $regiones)->get();
        if (!$puntos) throw new Exception("El punto de venta no se encuentra en nuestros registros", 0);

        return $puntos->toArray();
    }


    public function obtenerPuntosVentasPorPtvId(Int $id): array
    {
        $puntos = self::where("ptv_id", $id)->first();
        if (!$puntos) throw new Exception("El punto de venta no se encuentra en nuestros registros", 0);

        return $puntos->toArray();
    }

    public function obtenerRegionById(Int $id)
    {
        $ubicacion = DB::table('clf_punto_venta')
            ->join('cut_region', 'cut_region.reg_id', 'clf_punto_venta.reg_id')
            ->where('ptv_id', $id)->select(
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
        $ubicacion = DB::table('clf_punto_venta')
            ->join('cut_comuna', 'cut_comuna.com_id', 'clf_punto_venta.com_id')
            ->where('ptv_id', $id)->select(
                'cut_comuna.com_id',
                'cut_comuna.com_id_hml',
                'cut_comuna.com_nombre AS nombre',
                'cut_comuna.reg_id',
                'cut_comuna.com_ind_acti',
            )->distinct()->first();

        return $ubicacion;
    }

    public function obtenerHorariosById(Int $id)
    {
        $horario = DB::table('clf_punto_venta')
            ->join('clf_horario_atencion', 'clf_horario_atencion.ptv_id', 'clf_punto_venta.ptv_id')
            ->select('clf_horario_atencion.*')->where('clf_horario_atencion.ptv_id', $id)
            ->first();

        return $horario;
    }
    public function obtenerDistribucionById(Int $id)
    {
        $distribucion = DB::table('clf_punto_venta')
            ->join('clf_distribucion', 'clf_distribucion.ptv_id', 'clf_punto_venta.ptv_id')
            ->join('prm_tipo_distribucion', 'prm_tipo_distribucion.tidi_id', 'clf_distribucion.tidi_id')
            ->select('prm_tipo_distribucion.tidi_id', 'prm_tipo_distribucion.tidi_nombre', 'prm_tipo_distribucion.tidi_ind_act')->where('clf_punto_venta.ptv_id', $id)
            ->first();

        return $distribucion;
    }
    public function obtenerMedioPagoById(Int $id)
    {
        $medioPago = DB::table('clf_punto_venta')
            ->join('clf_medio_pago', 'clf_medio_pago.ptv_id', 'clf_punto_venta.ptv_id')
            ->join('prm_tipo_medio_pago', 'prm_tipo_medio_pago.timp_id', 'clf_medio_pago.timp_id')
            ->select('prm_tipo_medio_pago.timp_id', 'prm_tipo_medio_pago.timp_nombre', 'prm_tipo_medio_pago.timp_ind_act')->where('clf_punto_venta.ptv_id', $id)
            ->first();

        return $medioPago;
    }

    public function guardarPuntoVenta(array $formulario)
    {
        /**
         * id combustible
         */
        $tico_id = $formulario['idCombustible'];

        /**
         * form punto de venta
         */
        $ptv_nombre = $formulario['formPuntoVenta']['nombrePVenta'];
        $reg_id = $formulario['formPuntoVenta']['region']['id'];
        $com_id = $formulario['formPuntoVenta']['comuna']['id'];
        $ptv_direccion = $formulario['formPuntoVenta']['direccion'];
        $ptv_utm_este = $formulario['formPuntoVenta']['utmEste'];
        $ptv_utm_norte = $formulario['formPuntoVenta']['utmNorte'];
        $ptv_geolocalizado = $formulario['formPuntoVenta']['geolocalizada'];
        $ptv_fuente = $formulario['formPuntoVenta']['fuente'];

        /**
         * form de contacto
         */
        $ptv_nombre_contacto = $formulario['formContacto']['nombreCompleto'];
        $ptv_telefono_contacto = $formulario['formContacto']['telefono'];
        $ptv_correo_contacto = $formulario['formContacto']['correo'];
        $ptv_whatsapp_contacto = $formulario['formContacto']['wsp'];
        $ptv_certificaciones = $formulario['formContacto']['certificaciones'];

        /**
         * informacion validada
         */
        $ptv_informacion_validada = $formulario['validada']['validada'];
        $ptv_observacion = $formulario['validada']['observacionesGeneral'];

        $punto = new self();
        $punto->ptv_nombre = $ptv_nombre;
        $punto->reg_id = $reg_id;
        $punto->com_id = $com_id;
        $punto->ptv_direccion = $ptv_direccion;
        $punto->ptv_fuente = $ptv_fuente;
        $punto->ptv_utm_este = $ptv_utm_este;
        $punto->ptv_utm_norte = $ptv_utm_norte;
        $punto->ptv_geolocalizado = $ptv_geolocalizado;
        $punto->ptv_nombre_contacto = $ptv_nombre_contacto;
        $punto->ptv_telefono_contacto = $ptv_telefono_contacto;
        $punto->ptv_correo_contacto = $ptv_correo_contacto;
        $punto->ptv_whatsapp = $ptv_whatsapp_contacto;
        $punto->ptv_informacion_valida = $ptv_informacion_validada;
        $punto->ptv_observacion = $ptv_observacion;
        $punto->ptv_certificaciones = $ptv_certificaciones;
        $punto->tico_id = $tico_id;
        $punto->ptv_ind_act = 1;
        $punto->ptv_thegeom = '';
        $punto->save();

        return $punto->toArray();
    }

    public function editarPuntoVenta(array $formulario)
    {
        if (isset($formulario['formPuntoVenta']['region']['reg_id'])) {
            $reg_id = $formulario['formPuntoVenta']['region']['reg_id'];
        } else {
            $reg_id = $formulario['formPuntoVenta']['region']['id'];
        }
        if (isset($formulario['formPuntoVenta']['region']['reg_id'])) {
            $com_id = $formulario['formPuntoVenta']['comuna']['com_id'];
        } else {
            $com_id = $formulario['formPuntoVenta']['comuna']['id'];
        }
        /**
         * id punto de venta
         */
        $idPV = $formulario['ptv_id'];
        /**
         * id combustible
         */
        $tico_id = $formulario['idCombustible'];

        /**
         * form punto de venta
         */
        $ptv_nombre = $formulario['formPuntoVenta']['nombrePVenta'];
        $ptv_direccion = $formulario['formPuntoVenta']['direccion'];
        $ptv_utm_este = $formulario['formPuntoVenta']['utmEste'];
        $ptv_utm_norte = $formulario['formPuntoVenta']['utmNorte'];
        $ptv_geolocalizado = $formulario['formPuntoVenta']['geolocalizada'];
        $ptv_fuente = $formulario['formPuntoVenta']['fuente'];
        /**
         * form de contacto
         */
        $ptv_nombre_contacto = $formulario['formContacto']['nombreCompleto'];
        $ptv_telefono_contacto = $formulario['formContacto']['telefono'];
        $ptv_correo_contacto = $formulario['formContacto']['correo'];
        $ptv_whatsapp_contacto = $formulario['formContacto']['wsp'];
        $ptv_certificaciones = $formulario['formContacto']['certificaciones'];

        /**
         * informacion validada
         */
        $ptv_informacion_validada = $formulario['validada']['validada'];
        $ptv_observacion = $formulario['validada']['observacionesGeneral'];

        /**
         * obtengo la tupla correspondiente
         */
        $punto = self::where("ptv_id", $idPV)->first();

        $punto->ptv_nombre = $ptv_nombre;
        $punto->reg_id = $reg_id;
        $punto->com_id = $com_id;
        $punto->ptv_direccion = $ptv_direccion;
        $punto->ptv_fuente = $ptv_fuente;
        $punto->ptv_utm_este = $ptv_utm_este;
        $punto->ptv_utm_norte = $ptv_utm_norte;
        $punto->ptv_geolocalizado = $ptv_geolocalizado;
        $punto->ptv_nombre_contacto = $ptv_nombre_contacto;
        $punto->ptv_telefono_contacto = $ptv_telefono_contacto;
        $punto->ptv_correo_contacto = $ptv_correo_contacto;
        $punto->ptv_whatsapp = $ptv_whatsapp_contacto;
        $punto->ptv_informacion_valida = $ptv_informacion_validada;
        $punto->ptv_observacion = $ptv_observacion;
        $punto->ptv_certificaciones = $ptv_certificaciones;
        $punto->tico_id = $tico_id;
        $punto->ptv_thegeom = null;
        $punto->save();

        return $punto->toArray();
    }

    public function guardarImagenPuntoVenta(String $urlImagen, Int $ptv_id, String $nombre)
    {
        $puntoModificar = self::where("ptv_id", $ptv_id)->first();
        $puntoModificar->ptv_url_imagen = $urlImagen;
        $puntoModificar->ptv_nombre_imagen = $nombre;

        return $puntoModificar->save();
    }

    public function editarImagenPuntoVenta(String $urlImagen, Int $ptv_id, String $nombre)
    {
        $puntoModificar = self::where("ptv_id", $ptv_id)->first();
        $puntoModificar->ptv_url_imagen = $urlImagen;
        $puntoModificar->ptv_nombre_imagen = $nombre;

        return $puntoModificar->save();
    }

    public function habilitarPunto(array $datos)
    {
        if ($datos['habilitar'] === false) {
            $activo = 0;
        } else {
            $activo = 1;
        }
        $id = $datos['ptv_id'];
        $puntoModificar = self::where("ptv_id", $id)->first();
        $puntoModificar->ptv_ind_act = $activo;

        return $puntoModificar->save();
    }

    public function eliminar(int $id)
    {
        $calificacion = self::where("ptv_id", $id)->delete();
        return $calificacion;
    }
    public function validar(
        int $idCombustible,
        string $direccion
    ) {
        $validar = self::where("tico_id", $idCombustible)
            ->where('ptv_direccion', $direccion)
            ->first();
        if ($validar) {
            return true;
        } else {
            return false;
        }
    }
    public function validarEditar(
        int $id,
        int $idCombustible,
        string $direccion
    ) {
        $validar = self::whereNotIn('ptv_id', [$id])->where("tico_id", $idCombustible)
            ->where('ptv_direccion', $direccion)
            ->first();
        if ($validar) {
            return true;
        } else {
            return false;
        }
    }
}
