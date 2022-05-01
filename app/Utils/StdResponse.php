<?php

namespace App\Utils;

class StdResponse
{
    public $status;

    public $message;

    public $data;

    public $error;


    /**
     * Constructor de la clase
     *
     * @param bool $status      Estado que indica exito o fracaso en una operacion
     * @param string $message   Mensaje de salida que complementa el resultado
     * @param object $data      Objeto que alberga el contenido de la respuesta
     * @param object $error     Objeto que alberga detalles de los errores
     *
     */
    public function __construct($status = false, $message = null, $data = null, $error = null, $codigo = null)
    {
        $this->status = $status;
        $this->message = $message;
        $this->data = $data;
        $this->error = $error;
    }
}
