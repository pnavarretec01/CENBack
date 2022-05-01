<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>Hola "{{$detalles['usua_nombre']}}"</p>
    <p>Utiliza este código temporal: <strong>{{$codigo}}</strong>, ingresa a nuestro portal</p>
    <p>{{ env('APP_URL_FRONT') }}#/restablecer, donde deberás actualizar tus contraseñas</p>
    <p style="display: inline-block;">O ingresa directamente al: <a href="{{ env('APP_URL_FRONT') }}#/restablecer">
            &nbsp;<h3 style="display: inline-block;">Link</h3>
        </a></p>
    <p style="display: inline-block;">En caso de consultas visítanos en: &nbsp;</p><a href="{{ env('APP_URL_CONSULTAS') }}">
        <p style="display: inline-block;">{{ env('APP_URL_CONSULTAS') }}</p>
    </a>
    <p>Gracias</p>
    <p>Equipo CNE</p>
</body>

</html>