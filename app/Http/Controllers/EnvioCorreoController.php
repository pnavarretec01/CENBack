<?php

namespace App\Http\Controllers;

use App\Mail\EnvioRecuperacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EnvioCorreoController extends Controller
{
    public function enviarCorreoRecuperacion(Request $request)
    {
        // $correo = $request->usua_correo;
        // $detalles = $request->json()->all();
        // Mail::to($correo)->send(new EnvioRecuperacion($detalles));
        
        // return "Correo enviado";
    }
}
