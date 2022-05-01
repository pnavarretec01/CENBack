<?php

namespace App\Services;

use App\Domain\Repository\UsuarioInterface;
use App\Domain\Repository\ClfUsuarioDpaInterface;
use Exception;
use Illuminate\Support\Facades\Hash;
use App\Mail\EnvioRecuperacion;
use Illuminate\Support\Facades\Mail;

class UsuarioService
{
    const CADENA_ALEATORIA = 6;
    const CADENA_ALEATORIA_TOKEN = 12;

    private $repository;
    private $repositoryDpa;

    public function __construct(UsuarioInterface $repository, ClfUsuarioDpaInterface $repositoryDpa)
    {
        $this->repository = $repository;
        $this->repositoryDpa = $repositoryDpa;
    }

    public function Login(array $data): array
    {
        $usuario = $this->repository->getUsuarioByCorreo($data['usua_correo']);
        if (!$usuario) {
            return [
                'error' => 'El correo ingresado no se encuentra en nuestros registros',
                'code' => 400
            ];
        }
        $pwd = $this->repository->getPwd($data['usua_correo']);
        $activo = $this->repository->validarActivo($data['usua_correo']);
        if ($activo === 0) {
            return [
                'error' => 'Usuario deshabilitado, restablezca su contraseña o contacte con un administrador',
                'code' => 400
            ];
        }
        $intento = $this->repository->intentoSesion($data['usua_correo']);
        if (!Hash::check($data['password'], $pwd['usua_clave'])) {
            $intentoSesion = $intento + 1;
            if ($intento >= 3) {
                return [
                    'error' => 'Usuario deshabilitado, restablezca su contraseña o contacte con un administrador',
                    'code' => 400
                ];
            } else {
                $this->repository->sumaIntento($data['usua_correo'], $intentoSesion);

                return [
                    'error' => 'Credenciales inválidas, intento ' . $intentoSesion . ' de sesión de 3',
                    'code' => 400
                ];
            }
        }
        $usuario['regiones'] = $this->repository->obtenerRegionByIdUsuario($usuario['usua_id']);
        $usuario['comunas'] = $this->repository->obtenerComunaByIdUsuario($usuario['usua_id']);
        $this->repository->reiniciarContadorLogin($data['usua_correo']);
        //$usuarioNuevo = $this->repository->habilitarUsuario($usuario);

        return [
            "status" => true,
            "data" => $usuario,
        ];
    }

    public function verificarCorreo(array $data): array
    {
        $usuario = $this->repository->getUsuarioByCorreo($data['usua_correo']);
        if ($data['usua_correo'] != $usuario['usua_correo']) {
            return [
                'error' => 'El correo ingresado no se encuentra en nuestros registroas',
                'code' => 400
            ];
        } else {
            return [
                "status" => true,
                "data" => $usuario,
            ];
        }
    }

    private function generarCodigo($longitud = self::CADENA_ALEATORIA)
    {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern) - 1;
        for ($i = 0; $i < $longitud; $i++)
            $key .= $pattern{
                mt_rand(0, $max)};
        return $key;
    }

    private function generarToken($longitud = self::CADENA_ALEATORIA_TOKEN)
    {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern) - 1;
        for ($i = 0; $i < $longitud; $i++)
            $key .= $pattern{
                mt_rand(0, $max)};
        return $key;
    }

    public function recuperarContraseña(array $data): array
    {
        $usuario = $this->repository->getUsuarioByCorreoRecuperar($data['usua_correo']);
        $usuario = $this->repository->setCodigoRecuperar($this->generarCodigo(), $usuario['usua_id']);
        $usuario['regiones'] = $this->repository->obtenerRegionByIdUsuario($usuario['usua_id']);
        $usuario['comunas'] = $this->repository->obtenerComunaByIdUsuario($usuario['usua_id']);
        Mail::to($data['usua_correo'])->send(new EnvioRecuperacion($usuario, $usuario['codigo_recuperacion']));

        return [
            "status" => true,
            "data" => $usuario,
        ];
    }

    public function guardarContrasenaNueva(array $data): array
    {
        $usuario = $this->repository->getUsuarioByCorreo($data['usua_correo']);
        $clave = $data['password'];
        $clave = Hash::make($clave);
        $this->repository->reiniciarContadorLogin($data['usua_correo']);
        $this->repository->activarUsuario($data['usua_correo']);
        $this->repository->guardarContrasena($clave, $usuario['usua_id']);
        $this->repository->borrarCodigo($usuario['usua_id']);

        return [
            "status" => true,
            "data" => $usuario,
        ];
    }

    public function validarCodigo(array $datos)
    {
        $this->repository->validarCodigo($datos['id'], $datos['codigo']);
        return [
            "status" => true,
            "data" => null,
        ];
    }

    public function validarToken(array $datos)
    {
        $this->repository->validarToken($datos['usua_id'], $datos['usua_token']);

        return [
            "status" => true,
            "data" => null,
        ];
    }

    public function listarUsuarios(): array
    {
        if (Auth()->user()->tipe_id === 1) {
            $usuario = $this->repository->listarUsuarios();
            $usuarios = [];
            foreach ($usuario as $item) {
                $item['region'] = $this->repository->obtenerRegionCompletaByIdUsuario($item['usua_id']);
                $item['comuna'] = $this->repository->obtenerComunaCompletaByIdUsuario($item['usua_id']);
                $item['tipoPerfil'] = $this->repository->obtenerTipoPerfilByIdUsuario($item['usua_id']);
                $usuarios[] = $item;
            }
            if (!$usuarios)
                throw new Exception("No existen usuarios en nuestros registros", 400);

            return [
                "status" => true,
                "data" => $usuarios,
            ];
        } else {
            throw new Exception("Su usuario no tiene acceso a esta función, favor comuníquese con un Admistrador/a.", 1);
        }
    }

    public function habilitarUsuario(array $usuario)
    {
        if (Auth()->user()->tipe_id === 1) {
            $usuarioNuevo = $this->repository->habilitarUsuario($usuario);

            return [
                "status" => true,
                "data" => $usuarioNuevo,
            ];
        } else {
            throw new Exception("Su usuario no tiene acceso a esta función, favor comuníquese con un Admistrador/a.", 1);
        }
    }

    public function agregarUsuario(array $data): array
    {
        if (Auth()->user()->tipe_id === 1) {
            $verifCorreo = $this->repository->validarCorreo($data['email']);
            if ($verifCorreo) {
                throw new Exception("Ya existe un usuario con este correo", 1000);
            } else {
                $clave = Hash::make($data['contrasena']);
                $usuario = $this->repository->agregarUsuario(
                    $data['nombre'],
                    $data['perfil']['tipe_id'],
                    $data['telefono'],
                    $data['email'],
                    $clave
                );
                $idusuario = $usuario['usua_id'];
                foreach ($data['comuna'] as $datos) {
                    $idComuna = $datos['id'];
                    $idRegion = $datos['idRegion'];
                    $this->repositoryDpa->insertar($idusuario, $idRegion, $idComuna);
                }
            }

            return [
                "status" => true,
                "data" => $usuario,
            ];
        } else {
            throw new Exception("Su usuario no tiene acceso a esta función, favor comuníquese con un Admistrador/a.", 1);
        }
    }

    public function editarUsuario(array $data): array
    {

        if (Auth()->user()->tipe_id === 1) {
            $verifCorreo = $this->repository->validarCorreoEditar($data['email'], $data['idUsuario']);
            if ($verifCorreo) {
                throw new Exception("Ya existe un usuario con este correo", 1000);
            } else {
                if ($data['contrasena']) {
                    $clave = Hash::make($data['contrasena']);
                } else {
                    $clave = "";
                }
                $idUser = $data['idUsuario'];
                $usuario = $this->repository->editarUsuario(
                    $idUser,
                    $data['nombre'],
                    $data['perfil']['tipe_id'],
                    $data['telefono'],
                    $data['email'],
                    $clave
                );
                /**
                 * Hago esto solo para poder actualizar la fecha de modificación
                 * ya que si se modifica region o comuna no se actualiza el updated_at de la tabla de usuarios
                 */
                $activo = $usuario['usua_ind_act'];
                if ($activo) {
                    $cambio = false;
                } else {
                    $cambio = true;
                }
                if ($activo) {
                    $activo = true;
                } else {
                    $activo = false;
                }
                $objUsuario = [
                    "usua_id" => $idUser,
                    "usua_ind_act" => $cambio
                ];
                $objUsuarioNormal = [
                    "usua_id" => $idUser,
                    "usua_ind_act" => $activo
                ];
                $this->repository->habilitarUsuario($objUsuario);
                $this->repository->habilitarUsuario($objUsuarioNormal);
                /**
                 * fin actualizacion updated at
                 */
                $idusuario = $usuario['usua_id'];
                $this->repositoryDpa->eliminar($idusuario);
                foreach ($data['comuna'] as $datos) {
                    if (!isset($datos['com_id'])) {
                        $idComuna = $datos['id'];
                        $idRegion = $datos['idRegion'];
                        $this->repositoryDpa->insertar($idusuario, $idRegion, $idComuna);
                    } else {
                        $idComuna = $datos['com_id'];
                        $idRegion = $datos['reg_id'];
                        $this->repositoryDpa->insertar($idusuario, $idRegion, $idComuna);
                    }
                }

                return [
                    "status" => true,
                    "data" => $usuario,
                ];
            }
        } else {
            throw new Exception("Su usuario no tiene acceso a esta función, favor comuníquese con un Admistrador/a.", 1);
        }
    }

    public function eliminar($usuario)
    {
        if (Auth()->user()->tipe_id === 1) {
            $id = $usuario[0];
            $usuario = $this->repositoryDpa->eliminar($id);
            $usuario = $this->repository->eliminar($id);

            return [
                "status" => true,
                "data" => $usuario
            ];
        } else {
            throw new Exception("Su usuario no tiene acceso a esta función, favor comuníquese con un Admistrador/a.", 1);
        }
    }
}
