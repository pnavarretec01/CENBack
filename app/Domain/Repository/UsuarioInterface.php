<?php

namespace App\Domain\Repository;

interface UsuarioInterface
{
    public function getUsuarioByCorreo(String $correo);
    public function setCodigoRecuperar(String $codigo, Int $usuario);
    public function borrarCodigo(Int $usuario);
    public function obtenerRegionByIdUsuario(Int $id);
    public function obtenerComunaByIdUsuario(Int $id);
    public function guardarContrasena(String $clave, Int $usuario);
    public function validarCodigo(int $id, string $codigo);
    public function getPwd(String $correo);
    public function guardarToken(int $id, string $token);
    public function validarToken(int $id, string $token);
    public function listarUsuarios();
    public function habilitarUsuario(array $usuario);
    public function obtenerTipoPerfilByIdUsuario(Int $id);
    public function obtenerRegionCompletaByIdUsuario(Int $id);
    public function obtenerComunaCompletaByIdUsuario(Int $id);
    public function validarCorreo(string $correo);
    public function agregarUsuario(
        string $nombre,
        int $idPerfil,
        int $telefono,
        string $correo,
        string $clave
    );
    public function editarUsuario(
        int $idUser,
        string $nombre,
        int $idPerfil,
        int $telefono,
        string $correo,
        string $clave
    );
    public function eliminar(int $id);
    public function intentoSesion(String $correo): int;
    public function sumaIntento(String $correo, $intentoSesion);
    public function validarActivo(String $correo);
    public function validarCorreoEditar(string $correo, int $id);
    public function reiniciarContadorLogin(String $correo);
    public function getUsuarioByCorreoRecuperar(String $correo);
    public function activarUsuario(String $correo);
}
