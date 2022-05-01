<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use App\Utils\Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{

    /**
     * Devuelve la lista de puntos de ventas según tipo de combustible.
     *
     * @return \Illuminate\Http\Response
     */
    public function listaPuntoVenta(Request $request){

        $response = Helper::createStdResponse();
        try {

            $query_puntosVentas = DB::table('clf_punto_venta')
                ->leftJoin('prm_tipo_combustible', 'clf_punto_venta.tico_id', '=', 'prm_tipo_combustible.tico_id')
                ->leftJoin('cut_region', 'clf_punto_venta.reg_id', '=', 'cut_region.reg_id')
                ->leftJoin('cut_comuna', 'clf_punto_venta.com_id', '=', 'cut_comuna.com_id');

            /*Comienza validación de filtros*/
            if(isset($request->region)){
                //$regiones = json_decode($request->region, true);
                $regiones = explode(",",trim($request->region,'[\]'));
                /*Se valida que el parametro ingresado sea de tipo array*/
                if(gettype($regiones) == 'array'){
                    $query_puntosVentas->whereIn('clf_punto_venta.reg_id',$regiones);
                }else{
                    return response()->json(['error' => 'El parametro región debe ser de tipo array'], 400);
                }
            }

            if(isset($request->comuna)){
                $comunas = explode(",",trim($request->comuna,'[\]'));

                /*Se valida que el parametro ingresado sea de tipo array*/
                if(gettype($comunas) == 'array'){
                    $comunas = array_map('strtolower',$comunas);
                    $query_puntosVentas->whereIn(DB::raw('lower(cut_comuna.com_nombre)'),$comunas);
                }else{
                    return response()->json(['error' => 'El parametro región debe ser de tipo array'], 400);
                }
            }
            /*Fin validación de filtros*/

            $puntosVentas = $query_puntosVentas->get();

            $ptVenta_consolidado = [];
            foreach ($puntosVentas as $pv){
                /*Obtengo los productos*/
                $productos = DB::table('clf_producto')
                    ->select('prod_id','ptv_id','prm_tipo_producto.tipr_nombre',
                        'prm_especie_normalizada.tien_nombre','prm_unidad_normalizada.tiun_nombre',
                    'prod_tiene_stock','prod_marca')
                    ->leftJoin('prm_tipo_producto', 'clf_producto.tipr_id', '=', 'prm_tipo_producto.tipr_id')
                    ->leftJoin('prm_especie_normalizada', 'clf_producto.tien_id', '=', 'prm_especie_normalizada.tien_id')
                    ->leftJoin('prm_unidad_normalizada', 'clf_producto.tiun_id', '=', 'prm_unidad_normalizada.tiun_id')
                    ->where('clf_producto.ptv_id','=',$pv->ptv_id)->get();

                /*Obtengo el horario de atencion*/
                $horario = DB::table('clf_horario_atencion')
                    ->where("ptv_id",'=',$pv->ptv_id)
                    ->get();

                /*Obtengo Medios de pago*/
                $medPago = DB::table('clf_medio_pago')
                    ->select('clf_medio_pago.timp_id as timp_id','prm_tipo_medio_pago.timp_nombre')
                    ->leftJoin('prm_tipo_medio_pago','clf_medio_pago.timp_id','=','prm_tipo_medio_pago.timp_id')
                    ->where("ptv_id",'=',$pv->ptv_id)
                    ->get();

                /*Obtengo Distribucio*/
                $distribucion = DB::table('clf_distribucion')
                    ->select('clf_distribucion.tidi_id as tidi_id','prm_tipo_distribucion.tidi_nombre')
                    ->leftJoin('prm_tipo_distribucion','clf_distribucion.tidi_id','=','prm_tipo_distribucion.tidi_id')
                    ->where("ptv_id",'=',$pv->ptv_id)
                    ->get();

                $ptVenta_consolidado[] = array(
                    "ptv_id"                => $pv->ptv_id,
                    "ptv_nombre"            => $pv->ptv_nombre,
                    "reg_id"                => $pv->reg_id,
                    "reg_nombre"            => $pv->reg_nombre,
                    "com_id"                => $pv->com_id,
                    "com_nombre"            => $pv->com_nombre,
                    "ptv_direccion"         => $pv->ptv_direccion,
                    "ptv_utm_este"          => $pv->ptv_utm_este,
                    "ptv_utm_norte"         => $pv->ptv_utm_norte,
                    "ptv_geolocalizado"     => $pv->ptv_geolocalizado,
                    "ptv_nombre_contacto"   => $pv->ptv_nombre_contacto,
                    "ptv_telefono_contacto" => $pv->ptv_telefono_contacto,
                    "ptv_correo_contacto"   => $pv->ptv_correo_contacto,
                    "ptv_whatsapp"          => $pv->ptv_whatsapp,
                    "ptv_informacion_valida"=> $pv->ptv_informacion_valida,
                    "ptv_observacion"       => $pv->ptv_observacion,
                    "tico_id"               => $pv->tico_id,
                    "tico_nombre"           => $pv->tico_descripcion,
                    "ptv_ind_act"           => $pv->ptv_ind_act,
                    "ptv_thegeom"           => $pv->ptv_thegeom,
                    "productos"             => $productos->toArray(),
                    "horario_atencion"      => $horario->toArray(),
                    "medio_pago"            => $medPago->toArray(),
                    "distribucion"          => $distribucion->toArray()
                );

            }

            $response->data = $ptVenta_consolidado;
            $response->status = 'OK';
            $response->message = 'Información obtenida con éxito';
        } catch (Exception $e) {
            $response->status = 'NOK';
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al listar los puntos de ventas';
        }

        Helper::jsonResponse($response);
    }

    /**
     * Devuelve la lista regiones con sus comunas.
     *
     * @return \Illuminate\Http\Response
     */
    public function listaRegiones(Request $request){

        $response = Helper::createStdResponse();
        try {

            $query_regiones = DB::table('cut_region')
                ->select('reg_id','reg_nombre','reg_orden')
                ->orderBy('reg_orden')
                ->get();

            $response->data = $query_regiones;
            $response->status = 'OK';
            $response->message = 'Información obtenida con éxito';
        } catch (Exception $e) {
            $response->status = 'NOK';
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al listar las regiones';
        }

        Helper::jsonResponse($response);
    }

    /**
     * Devuelve la lista regiones con sus comunas.
     *
     * @return \Illuminate\Http\Response
     */
    public function listaComunas(Request $request){

        $response = Helper::createStdResponse();
        try {

            $query_comunas = DB::table('cut_comuna')
                ->select('com_id','com_nombre','reg_id');

            if(isset($request->region)){
                $query_comunas->where('reg_id','=',$request->region);
            }
            $result_comunas = $query_comunas->orderBy('com_nombre','asc')->get();

            $response->data = $result_comunas;
            $response->status = 'OK';
            $response->message = 'Información obtenida con éxito';
        } catch (Exception $e) {
            $response->status = 'NOK';
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al listar las comunas';
        }

        Helper::jsonResponse($response);
    }

    /**
     * Devuelve la lista de Tarifa electrica.
     *
     * @return \Illuminate\Http\Response
     */
    public function listaTarifaElectrica(Request $request){

        $response = Helper::createStdResponse();
        try {

            $query_tarifas = DB::table('clf_tarifa_electrica')
                ->select('clf_tarifa_electrica.reg_id','cut_region.reg_nombre',
                    'clf_tarifa_electrica.com_id','cut_comuna.com_nombre','tari_url','tari_informacion','tari_mensaje','tari_ind_act')
                ->leftJoin('cut_region', 'clf_tarifa_electrica.reg_id', '=', 'cut_region.reg_id')
                ->leftJoin('cut_comuna', 'clf_tarifa_electrica.com_id', '=', 'cut_comuna.com_id')
                ->where('tari_ind_act','=',1);

            if(isset($request->region)){
                //$regiones = json_decode($request->region, true);
                $regiones = explode(",",trim($request->region,'[\]'));
                /*Se valida que el parametro ingresado sea de tipo array*/
                if(gettype($regiones) == 'array'){
                    $query_tarifas->whereIn('clf_tarifa_electrica.reg_id',$regiones);
                }else{
                    return response()->json(['error' => 'El parametro región debe ser de tipo array'], 400);
                }
            }

            if(isset($request->comuna)){
                $comunas = explode(",",trim($request->comuna,'[\]'));

                /*Se valida que el parametro ingresado sea de tipo array*/
                if(gettype($comunas) == 'array'){
                    $comunas = array_map('strtolower',$comunas);
                    $query_tarifas->whereIn(DB::raw('lower(cut_comuna.com_nombre)'),$comunas);
                }else{
                    return response()->json(['error' => 'El parametro región debe ser de tipo array'], 400);
                }
            }
            $result_tarifas = $query_tarifas->get();

            $response->data = $result_tarifas;
            $response->status = 'OK';
            $response->message = 'Información obtenida con éxito';
        } catch (Exception $e) {
            $response->status = 'NOK';
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al listar las tarifas';
        }

        Helper::jsonResponse($response);
    }

    /**
     * Devuelve la lista de calificaciones.
     *
     * @return \Illuminate\Http\Response
     */
    public function listaCalificaciones(Request $request){

        $response = Helper::createStdResponse();
        try {

            $query_calificaciones = DB::table('clf_calificacion')
                ->select('cali_id','clf_calificacion.ptv_id','clf_punto_venta.ptv_nombre','cali_nombre_cliente','clf_calificacion.tpcl_id',
                    'prm_tipo_calificacion.tpcl_descripcion','prm_tipo_calificacion.tpcl_cant_estrellas')
                ->leftJoin('prm_tipo_calificacion', 'clf_calificacion.tpcl_id', '=', 'prm_tipo_calificacion.tpcl_id')
                ->leftJoin('clf_punto_venta', 'clf_calificacion.ptv_id', '=', 'clf_punto_venta.ptv_id');

            if(isset($request->punto_venta)){
                if(is_numeric($request->punto_venta)){
                    $query_calificaciones->where('clf_calificacion.ptv_id','=',$request->punto_venta);
                }else{
                    return response()->json(['error' => 'El parametro punto_venta debe ser númerico'], 400);
                }
            }
            $result_calificaciones = $query_calificaciones->get();

            $response->data = $result_calificaciones;
            $response->status = 'OK';
            $response->message = 'Información obtenida con éxito';
        } catch (Exception $e) {
            $response->status = 'NOK';
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al listar las calificaciones';
        }

        Helper::jsonResponse($response);
    }

    /**
     * Devuelve la lista de calificaciones.
     *
     * @return \Illuminate\Http\Response
     */
    public function insertCalificaciones(Request $request){

        $validator = Validator::make($request->all(), [
            'punto_venta_id'        => 'required|numeric',
            'cliente'               => 'required|string',
            'tipo_calificacion_id'  => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        $response = Helper::createStdResponse();
        try {

            $ult_cali_id = DB::table('clf_calificacion')->select('cali_id')->limit(1)->orderBy('cali_id','desc')->get();

            DB::table('clf_calificacion')->insert([
                'cali_id'              => ($ult_cali_id[0]->cali_id+1),
                'ptv_id'               => $request->punto_venta_id,
                'cali_nombre_cliente'  => $request->cliente,
                'tpcl_id'              => $request->tipo_calificacion_id,
                'cali_ind_act'         => 1,
            ]);

            $response->status = 'OK';
            $response->message = 'Información ingresada con éxito';
        } catch (Exception $e) {
            $response->status = 'NOK';
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al insertar la calificación';
        }

        Helper::jsonResponse($response);
    }
}
