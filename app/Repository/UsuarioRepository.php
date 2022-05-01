<?php

namespace App\Repository;

use App\Domain\Factory\UsuarioFactory;
use App\Domain\Repository\UsuarioInterface;
use App\Models\UsuarioDAO;
use Exception;
use Illuminate\Support\Facades\DB;

class UsuarioRepository extends UsuarioDAO implements UsuarioInterface
{
    public function getUsuarioByCorreo(String $correo)
    {
        $usuario = self::where("usua_correo", $correo)->select(
            'usua_id',
            'usua_nombre',
            'usua_telefono',
            'usua_correo',
            'updated_at',
            'updated_at',
            'usua_token',
            'tipe_id'
        )->first();
        if (!$usuario) return false;

        return $usuario->toArray();
    }

    public function getUsuarioByCorreoRecuperar(String $correo)
    {
        $usuario = self::where("usua_correo", $correo)->select(
            'usua_id',
            'usua_nombre',
            'usua_telefono',
            'usua_correo',
            'updated_at',
            'updated_at',
            'usua_token',
            'tipe_id'
        )->first();
        if (!$usuario) throw new Exception("El usuario no se encuentra en nuestros registros", 0);

        return $usuario->toArray();
    }

    public function reiniciarContadorLogin(String $correo)
    {
        $usuario = self::where("usua_correo", $correo)->first();
        $usuario->usua_intento_login = 0;

        return $usuario->save();
    }

    public function activarUsuario(String $correo)
    {
        $usuario = self::where("usua_correo", $correo)->first();
        $usuario->usua_ind_act = 1;

        return $usuario->save();
    }

    public function getPwd(String $correo)
    {
        $pwd = self::where("usua_correo", $correo)->select(
            'usua_clave',
            'updated_at',
            'updated_at'
        )->first();
        if (!$pwd) throw new Exception("El usuario no se encuentra en nuestros registros", 0);

        return $pwd;
    }

    public function validarActivo(String $correo)
    {
        $usuario = self::where("usua_correo", $correo)->select(
            'usua_ind_act'
        )->first();
        if (!$usuario) throw new Exception("El usuario no se encuentra en nuestros registros", 0);

        return $usuario->attributes['usua_ind_act'];
    }

    public function intentoSesion(String $correo): int
    {
        $usuario = self::where("usua_correo", $correo)->select(
            'usua_intento_login'
        )->first();
        if (!$usuario) throw new Exception("", 0);

        return $usuario->attributes['usua_intento_login'];
    }

    public function sumaIntento(String $correo, $intentoSesion)
    {
        if ($intentoSesion >= 3) {
            $usuario = self::where("usua_correo", $correo)->first();
            $usuario->usua_ind_act = 0;
            $usuario->save();
            if (!$usuario) throw new Exception("Usuario inhabilitado", 400);

            return $usuario;
        } else {
            $usuario = self::where("usua_correo", $correo)->first();
            $usuario->usua_intento_login = $intentoSesion;
            $usuario->save();
            if (!$usuario) throw new Exception("", 0);

            return $usuario;
        }
    }

    public function obtenerRegionByIdUsuario(Int $id)
    {
        $ubicacion = DB::table('clf_usuario_dpa')
            ->join('cut_region', 'cut_region.reg_id', 'clf_usuario_dpa.reg_id')
            ->where('usua_id', $id)->select('cut_region.reg_id', 'cut_region.reg_nombre')->distinct()->get();

        return $ubicacion;
    }

    public function obtenerTipoPerfilByIdUsuario(Int $id)
    {
        $tipoPerfil = DB::table('clf_usuario')
            ->join('prm_tipo_perfil', 'prm_tipo_perfil.tipe_id', 'clf_usuario.tipe_id')
            ->where('usua_id', $id)->select(
                'prm_tipo_perfil.tipe_id',
                'prm_tipo_perfil.tipe_nombre',
                'prm_tipo_perfil.tipe_ind_act'
            )->first();

        return $tipoPerfil;
    }

    public function obtenerComunaByIdUsuario(Int $id)
    {
        $ubicacion = DB::table('clf_usuario_dpa')
            ->join('cut_comuna', 'cut_comuna.com_id', 'clf_usuario_dpa.com_id')
            ->where('usua_id', $id)->select('cut_comuna.com_id', 'cut_comuna.com_nombre')->distinct()->get();

        return $ubicacion;
    }

    public function setCodigoRecuperar(String $codigo, Int $id)
    {
        $usuario = self::where("usua_id", $id)->first();
        $usuario->codigo_recuperacion = $codigo;
        $usuario->save();

        return $usuario;
    }

    public function borrarCodigo(Int $id)
    {
        $usuario = self::where("usua_id", $id)->first();
        $usuario->codigo_recuperacion = "";

        return $usuario->save();
    }

    public function guardarContrasena(String $clave, Int $id)
    {
        $usuario = self::where("usua_id", $id)->first();
        $usuario->usua_clave = $clave;
        $usuario->usua_intento_login = 0;

        return $usuario->save();
    }

    public function validarCodigo(int $id, string $codigo)
    {
        $usuario = self::where("usua_id", $id)->where("codigo_recuperacion", $codigo)->first();
        if (!$usuario) throw new Exception("El código ingresado no es válido", 0);

        return true;
    }

    public function guardarToken(int $id, string $token)
    {
        $usuario = self::where("usua_id", $id)->first();
        $usuario->usua_token = $token;

        return $usuario->save();
    }

    public function validarToken(int $id, string $token)
    {
        $usuario = self::where("usua_id", $id)->where("usua_token", $token)->first();
        if (!$usuario) throw new Exception("El token ingresado no es válido", 0);

        return true;
    }

    public function listarUsuarios()
    {
        $usuarios = self::orderBy('updated_at', 'DESC')->get();
        if (!$usuarios) throw new Exception("No se puede obtener los usuarios", 0);

        return $usuarios->toArray();
    }

    public function obtenerRegionCompletaByIdUsuario(Int $id)
    {
        $ubicacion = DB::table('clf_usuario_dpa')
            ->join('cut_region', 'cut_region.reg_id', 'clf_usuario_dpa.reg_id')
            ->where('usua_id', $id)->select(
                'cut_region.reg_id',
                'cut_region.reg_id_hml',
                'cut_region.reg_nombre AS nombre',
                'cut_region.reg_orden',
                'cut_region.reg_ind_act'
            )->distinct()->get();

        return $ubicacion;
    }

    public function obtenerComunaCompletaByIdUsuario(Int $id)
    {
        $ubicacion = DB::table('clf_usuario_dpa')
            ->join('cut_comuna', 'cut_comuna.com_id', 'clf_usuario_dpa.com_id')
            ->where('usua_id', $id)->select(
                'cut_comuna.com_id',
                'cut_comuna.com_id_hml',
                'cut_comuna.com_nombre AS nombre',
                'cut_comuna.reg_id',
                'cut_comuna.com_ind_acti'
            )->distinct()->get();

        return $ubicacion;
    }

    public function habilitarUsuario(array $usuario)
    {
        if ($usuario['usua_ind_act'] === false) {
            $activo = 0;
        } else {
            $activo = 1;
        }
        $id = $usuario['usua_id'];
        $usuarioModificar = self::where("usua_id", $id)->first();
        $usuarioModificar->usua_ind_act = $activo;
        $usuarioModificar->usua_intento_login = 0;

        return $usuarioModificar->save();
    }

    public function validarCorreo(string $correo)
    {
        $usuario = self::where("usua_correo", $correo)->first();
        if (!$usuario) return false;

        return true;
    }

    public function validarCorreoEditar(string $correo, int $id)
    {
        $usuario = self::where("usua_correo", $correo)->whereNotIn('usua_id', [$id])->first();
        if (!$usuario) return false;

        return true;
    }

    public function agregarUsuario(
        string $nombre,
        int $idPerfil,
        int $telefono,
        string $correo,
        string $clave
    ) {
        $usuarioNuevo = new self();
        $usuarioNuevo->usua_nombre = $nombre;
        $usuarioNuevo->usua_telefono = $telefono;
        $usuarioNuevo->usua_correo = $correo;
        $usuarioNuevo->tipe_id = $idPerfil;
        $usuarioNuevo->usua_clave = $clave;
        $usuarioNuevo->usua_intento_login = 0;
        $usuarioNuevo->usua_bloqueado = 0;
        $usuarioNuevo->usua_ind_act = 1;
        $usuarioNuevo->save();

        return $usuarioNuevo->toArray();
    }

    public function editarUsuario(
        int $idUsuario,
        string $nombre,
        int $idPerfil,
        int $telefono,
        string $correo,
        string $clave
    ) {
        $usuarioNuevo = self::where("usua_id", $idUsuario)->first();
        $usuarioNuevo->usua_nombre = $nombre;
        $usuarioNuevo->usua_telefono = $telefono;
        $usuarioNuevo->usua_correo = $correo;
        $usuarioNuevo->tipe_id = $idPerfil;
        if ($clave) {
            $usuarioNuevo->usua_clave = $clave;
        }
        $usuarioNuevo->save();

        return $usuarioNuevo->toArray();
    }

    public function eliminar(int $id)
    {
        $usuario = self::where("usua_id", $id)->delete();
        return $usuario;
    }
}
