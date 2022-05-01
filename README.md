# Manual de instalación

En este documento se explica como instalar el proyecto Back End de Calefacción en línea.

## Tabla de contenido

-   [Requerimientos](#requerimientos-previos).
-   [Repositorio](#repositorio).
-   [Instalación](#instalación).
-   [Instalación solución errores](#instalación-solución-errores).
-   [Configuración](#configuración).
-   [Instalación de Base de datos](#instalación-de-base-de-datos).
-   [Documentación acceso API](#documentación-acceso-api).

## Requisitos de Hardware:

-   8 GB RAM
-   250 GB de espacio libre en disco
-   4 Núcleos de procesador

## Requerimientos previos:

Los requerimientos de la plataforma son:

-   RedHat v 8.4.0
-   Apache/2.4.6
-   PHP 7.3.28 (Módulo Mysql)
-   Mysql Ver 15.1 Distrib 10.3.15-MariaDB
-   Composer

### Archivo .conf

Archivo Configuración Apache

```
<VirtualHost *:80>
  ServerName bel.paipai.cne.cl
  ServerAdmin soporte@cne.cl
  DocumentRoot /var/www/html/bel-ciudadano/dist/bel
  <Directory /var/www/html/bel-ciudadano/dist/bel>
        AllowOverride All
        Require all granted
        Options -Indexes +FollowSymLinks
  </Directory>
</VirtualHost>
```

## Repositorio:

Clonar en el directorio designado el repositorio:

```sh
git clone -b developer/patricio https://pnavarretec@bitbucket.org/desarrollocneti/calefaccionenlinea-administracion.git
```

## Instalación:

```sh
cd adv-app-cne-calefaccionenlinea-adm-back                                 # entra al directorio del proyecto
composer install
cp .env.example .env                                                       # copia la base del archivo .env
chmod -R 775 storage
chmod -R 775 bootstrap/cache                                               # generamops link de la carpeta storage a public
php artisan storage:link                                                   # cambiamos permisos para poder acceder a carpeta storage
cp .env.example .env                                                       # copia la base del archivo .env
php artisan key:generate                                                   # genera una nueva key de encriptación
php artisan jwt:secret                                                     # genera una nueva key de JWT
php artisan optimize                                                       # limpiamos cache de la aplicación
```
<p style="color: red"><strong>
*Si la instalación ha dado error, ejecutar los siguientes pasos:
</strong></p>

## Instalación solución errores:

En caso de que exista el archivo llamado composer.lock, proceder a eliminarlo.

```sh
rm -rf composer.lock                                                       # eliminamos composer.lock
```
### Proceder con lo siguiente: 

```sh
composer require tymon/jwt-auth --ignore-platform-reqs
```
Se instalarán las dependencias necesarías, pero arrojará error por código específico de una dependencia, de igual manera, seguir con lo siguiente:

```sh
rm -rf bootstrap/cache/*
rm -rf vendor
rm -rf composer.lock
composer install
```

Posterior a ello, proceder con la instalación normal

```sh
cp .env.example .env                                                       # copia la base del archivo .env
chmod -R 775 storage
chmod -R 775 bootstrap/cache                                               # generamops link de la carpeta storage a public
php artisan storage:link                                                   # cambiamos permisos para poder acceder a carpeta storage
cp .env.example .env                                                       # copia la base del archivo .env
php artisan key:generate                                                   # genera una nueva key de encriptación
php artisan jwt:secret                                                     # genera una nueva key de JWT
php artisan optimize                                                       # limpiamos cache de la aplicación
```



## Configuración

### Parámetros de configuración

En la raíz del directorio donde está instalado el Sistema de Calefacción en en Línea se encuentra el archivo .env con los siguientes parámetros de configuración más importantes:

| Parámetro         | Significado                                     | Valor por defecto             |
| ----------------- | ----------------------------------------------- | ----------------------------- |
| APP_NAME          | Nombre de la aplicación                         | Calefacción en Línea          |
| APP_ENV           |                                                 |                               |
| APP_KEY           |                                                 |                               |
| APP_DEBUG         |                                                 | true                          |
| APP_URL           | Url del Sistema Calefacción en Línea.           |                               |
| APP_URL_FRONT     | Url del Sistema Calefacción en Línea Front.     | http://localhost:8080/        |
| APP_URL_FRONT     | Url página de consultas.                        | http://pagina-de-consultas.cl |
| LOG_CHANNEL       | Canal de log.                                   | stack                         |
| DB_CONNECTION     | Tipo de conección a la base de datos.           | mysql                         |
| DB_HOST           | Identificador del servidor de la base de datos. | 127.0.0.1                     |
| DB_PORT           | Puerto para conectarse a la base de datos.      | 3306                          |
| DB_DATABASE       | Nombre de la base de datos.                     |                               |
| DB_USERNAME       | Usuario para conectarse a la base de datos.     |                               |
| BROADCAST_DRIVER  |                                                 | log                           |
| CACHE_DRIVER      |                                                 | file                          |
| QUEUE_CONNECTION  |                                                 | sync                          |
| SESSION_DRIVER    |                                                 | file                          |
| SESSION_LIFETIME  |                                                 | 120                           |
| MAIL_DRIVER       | Driver de mail                                  | mandrill                      |
| MAIL_HOST         | Host de mail                                    | smtp.mandrillapp.com          |
| MAIL_PORT         | Puerto de mail                                  | 587                           |
| MAIL_USERNAME     | Nombre de usuario de mail                       | bel@cne.cl                    |
| MAIL_FROM_ADDRESS | Mail                                            |                               |
| MAIL_FROM_NAME    | Nombre de mail                                  |                               |
| MAIL_PASSWORD     | Contraseña de mail                              |                               |
| MAIL_ENCRYPTION   |                                                 | null                          |
| JWT_SECRET        | Clave secreta de JWT                            |                               |

Luego de configurar los parámetros es necesario ejecutar los siguientes comandos:

```sh
php artisan config:clear
php artisan cache:clear
composer dump-autoload
php artisan view:clear
php artisan route:clear
php artisan optimize                                                       # limpiamos cache de la aplicación
```

## Instalación de Base de datos

```sh
php artisan migrate                                                        # Creamos tablas en nuestra Base de datos
php artisan db:seed                                                        # Poblamos con datos base tablas específicas de nuesta Base de datos
```

La ejecución puebla con datos las siguientes tablas del sistema:

-   Usuarios
-   Comunas
-   Regiones
-   Parámetros de tablas
-   Tipos de combustibles
-   Tipos de distribución
-   Tipos de medios de pago
-   Tipos de perfiles de usuario
-   Tipos de productos
-   Reportes

# Documentación acceso API

### Acceso principal Login [POST]

`POST /usuarios/inicio`

Definiremos `http://tu-url/` como ejemplo, la cual corresponde a la URL que se define como `APP_URL` en el backend.

Para Acceder a todas las apis, es necesario pasar por el acceso de Login, el cual nos devolverá un token válido por 60 minutos, el cual debemos insertar en el encabezado de cada petición que realicemos.

Ingresamos a la siguiente URL:

```
http://tu-url/usuarios/inicio
```

Ingresando los siguientes parámetros (con los datos del usuario con el que deseemos iniciar sesión):

```
{
    "usua_correo": "correo@gmail.com",
    "password": "Contraseña123."
}
```

Se obtiene la siguiente respuesta:

-   Response 200 (application/json)

        [
          "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvdXN1YXJpb3NcL2luaWNpbyIsImlhdCI6MTY0OTcwNjk0MSwiZXhwIjoxNjQ5NzEwNTQxLCJuYmYiOjE2NDk3MDY5NDEsImp0aSI6ImJhS1M1a3c3eWRRZm0zOUoiLCJzdWIiOjIxLCJwcnYiOiI3MWFmM2RkMzM2NDQzZWU0ZWZmNDZhYWUxZWQ3NzY2OTY3MGRhNTY3In0.LmNtkuXb0C-1zVlN3zOk7aKPcqhMmyU1Um2la4xrzAM",
          "tipo_token: "bearer",
          "expira": 3600,
        ]

### Refrescar token [POST]

`POST /usuarios/inicio/refreshToken` <br>
`Authorization: Bearer <token>`

Para evitar que se cierre la conexión para seguir realizando peticiones, podemos refrescar nuestro token, pero, en el encabezado de nuestra petición debemos adjuntar el token que deseamos actualizar `Authorization: Bearer <token>` en la siguiente ruta:  
`POST /usuarios/inicio/refreshToken`. De lo que se obtiene lo mismo que en el login, pero con un token actualizado, que posee la misma duración (60 minutos).

```
http://tu-url/usuarios/inicio/refreshToken
```

-   Response 200 (application/json)

        [
          "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvdXN1YXJpb3NcL2luaWNpbyIsImlhdCI6MTY0OTcwNjk0MSwiZXhwIjoxNjQ5NzEwNTQxLCJuYmYiOjE2NDk3MDY5NDEsImp0aSI6ImJhS1M1a3c3eWRRZm0zOUoiLCJzdWIiOjIxLCJwcnYiOiI3MWFmM2RkMzM2NDQzZWU0ZWZmNDZhYWUxZWQ3NzY2OTY3MGRhNTY3In0.LmNtkuXb0C-1zVlN3zOk7aKPcqhMmyU1Um2la4xrzAM",
          "tipo_token: "bearer",
          "expira": 3600,
        ]

## Puntos de venta [/puntosVenta/porIdUsuario]

### Puntos de venta leña/pellet [POST]

`POST /puntosVenta/porIdUsuario` <br>
`Authorization: Bearer <token>`

Para acceder a los puntos de venta tenemos 2 opciones, Leña o Pellet, donde, debemos ingresar a la siguiente URL:

```
http://tu-url/puntosVenta/porIdUsuario
```

Es una petición `POST` a la cual debemos ingresar un parametro de tipo `tico_id` el cual puede ser `1 o 2`, donde, `1` corresponde a puntos de venta `Leña` y `2` corresponde a puntos de venta `Pellet`

```
{
   "tico_id": 2
}
```

Se obtiene la siguiente respuesta, tanto para leña como para pellet:

-   Response 200 (application/json)

        "status": true,
        "message": null,
        "data": [
          {
                "ptv_id": 215,
                "ptv_nombre": "Punto venta pellet",
                "reg_id": 2,
                "com_id": 2102,
                "ptv_direccion": "Avenida Juan Antonio Rios 2843, Coronel, Bío Bío 4990000, Chile",
                "ptv_utm_este": -73,
                "ptv_utm_norte": -37,
                "ptv_geolocalizado": 1,
                "ptv_nombre_contacto": "Juan Perez",
                "ptv_telefono_contacto": 948062086,
                "ptv_correo_contacto": "juan.perez@adevcom.cl",
                "ptv_whatsapp": 956987456,
                "ptv_informacion_valida": 1,
                "ptv_observacion": "prueba",
                "tico_id": 2,
                "ptv_ind_act": 1,
                "ptv_thegeom": null,
                "ptv_fuente": "prueba",
                "ptv_certificaciones": "prueba",
                "created_at": "17/03/2022 17:47:51",
                "updated_at": "23/03/2022 04:13:51",
                "ptv_url_imagen": "http://calefaccion-badmin.desa2.adevcom.cl/storage/ImagenesPuntosDeVenta/1647539271_descarga.jpg",
                "ptv_nombre_imagen": "1647539271_descarga.jpg",
                "precioVacio": 0,
                "regiones": {
                    "reg_id": 2,
                    "reg_id_hml": "02",
                    "nombre": "Antofagasta",
                    "reg_orden": 3,
                    "reg_ind_act": 1
                },
                "comunas": {
                    "com_id": 2102,
                    "com_id_hml": "02102",
                    "nombre": "Mejillones",
                    "reg_id": 2,
                    "com_ind_acti": 1
                },
                "horarios": {
                    "hrat_id": 198,
                    "ptv_id": 215,
                    "hrat_lunes_inicio": null,
                    "hrat_lunes_cierre": null,
                    "hrat_martes_inicio": null,
                    "hrat_martes_cierre": null,
                    "hrat_miercoles_inicio": null,
                    "hrat_miercoles_cierre": null,
                    "hrat_jueves_inicio": null,
                    "hrat_jueves_cierre": null,
                    "hrat_viernes_inicio": null,
                    "hrat_viernes_cierre": null,
                    "hrat_sabado_inicio": null,
                    "hrat_sabado_cierre": null,
                    "hrat_domingo_inicio": null,
                    "hrat_domingo_cierre": null,
                    "hrat_festivo_inicio": null,
                    "hrat_festivo_fin": null,
                    "hrat_descripcion_horario": null
                },
                "distribucion": {
                    "tidi_id": 2,
                    "tidi_nombre": "Distribución 2",
                    "tidi_ind_act": 1
                },
                "medioPago": {
                    "timp_id": 1,
                    "timp_nombre": "Efectivo",
                    "timp_ind_act": 1
                }
            }
        ]

## Productos [/productos/listar]

### Listar tarifas [POST]

`POST /productos/listar` <br>
`Authorization: Bearer <token>`

```
http://tu-url/productos/listar
```

Petición POST a la cual debemos enviar el siguiente parámetro que corresponde al ID de un punto de venta:

```
{
   "ptv_id": 1
}
```

Se obtiene la siguiente respuesta:
-   Response 200 (application/json)

        "status": true,
        "message": null,
        "data": [
            {
                "prod_id": 32,
                "ptv_id": 1,
                "tipr_id": 2,
                "prod_especie": "Prueba",
                "tiun_id": 2,
                "tien_id": 15,
                "prod_unidad": "as",
                "prod_tiene_stock": 1,
                "prod_marca": null,
                "prod_precio": "1000",
                "prod_ind_act": 1,
                "unidadNormalizada": {
                    "tiun_id": 2,
                    "tiun_nombre": "Canasto2",
                    "tiun_ind_act": 0,
                    "tico_id": 1
                },
                "especieNormalizada": {
                    "tien_id": 15,
                    "tien_nombre": "Especie",
                    "tien_ind_act": 0,
                    "tico_id": 1
                },
                "tipoCombustible": {
                    "tico_id": 1,
                    "tico_descripcion": "Leña",
                    "tico_ind_act": 1
                },
                "tipoProducto": {
                    "tipr_id": 2,
                    "tipr_nombre": "Pellet",
                    "tipr_ind_act": 1,
                    "tico_id": 1
                }
            },
        ]

## Tarifa eléctrica [/tarifas/listar]

### Listar tarifas [GET]

`GET /tarifas/listar` <br>
`Authorization: Bearer <token>`

```
http://tu-url/tarifas/listar
```

Se obtiene la siguiente respuesta:

-   Response 200 (application/json)

        "status": true,
        "message": null,
        "data": [
            {
              "tari_id": 3,
              "reg_id": 1,
              "com_id": 1107,
              "tari_url": "www.googlealo.cl",
              "tari_informacion": "Aprovecha esta super tarifa.",
              "tari_mensaje": "Tarifa electric actualizada",
              "tari_ind_act": 1,
              "created_at": "03/03/2022 20:45:39",
              "updated_at": "31/03/2022 13:49:16",
              "region": {
                  "reg_id": 1,
                  "reg_id_hml": "01",
                  "nombre": "Tarapacá",
                  "reg_orden": 2,
                  "reg_ind_act": 1
              },
              "comuna": {
                  "com_id": 1107,
                  "com_id_hml": "01107",
                  "nombre": "Alto Hospicio",
                  "reg_id": 1,
                  "com_ind_acti": 1
              }
            },
        ]

## Calificaciones [/calificaciones/listar]

### Listar calificaciones [GET]

`GET /calificaciones/listar` <br>
`Authorization: Bearer <token>`

```
http://tu-url/calificaciones/listar
```

Se obtiene la siguiente respuesta:
-   Response 200 (application/json)

        "status": true,
        "message": null,
        "data": [
            {
              "cali_id": 6,
              "ptv_id": 1,
              "cali_nombre_cliente": "Juan Perez",
              "tpcl_id": 2,
              "cali_ind_act": 1,
              "created_at": "2022-03-10 15:20:29",
              "updated_at": "2022-04-08 10:10:10",
              "tpcl_cant_estrellas": 4,
              "tpcl_descripcion": "Buen trato",
              "tpcl_ind_act": 1,
              "puntoVenta": {
                  "ptv_id": 1,
                  "ptv_nombre": "Prueba111",
                  "reg_id": 8,
                  "com_id": 8102,
                  "ptv_direccion": "Once De Septiembre 2350, Providencia, Región Metropolitana de Santiago 7500000, Chile",
                  "ptv_utm_este": -71,
                  "ptv_utm_norte": -33,
                  "ptv_geolocalizado": 1,
                  "ptv_nombre_contacto": "Juan Perez",
                  "ptv_telefono_contacto": 956987896,
                  "ptv_correo_contacto": "jperez@gmail.com",
                  "ptv_whatsapp": 956987896,
                  "ptv_informacion_valida": 1,
                  "ptv_observacion": "Actualizado 15/03",
                  "tico_id": 1,
                  "ptv_ind_act": 0,
                  "ptv_thegeom": null,
                  "ptv_fuente": "fuente",
                  "ptv_certificaciones": "asddasaaa",
                  "created_at": "03/03/2022 19:57:47",
                  "updated_at": "22/03/2022 16:46:48",
                  "ptv_url_imagen": "http://calefaccion-badmin.desa2.adevcom.cl/storage/ImagenesPuntosDeVenta/1646728394_mapa_-3.png",
                  "ptv_nombre_imagen": "1646728394_mapa_-3.png"
              },
              "regionPuntoVenta": {
                  "reg_id": 8,
                  "reg_id_hml": "08",
                  "nombre": "Biobío",
                  "reg_orden": 10,
                  "reg_ind_act": 1
              },
              "comunaPuntoVenta": {
                  "com_id": 8102,
                  "com_id_hml": "08102",
                  "nombre": "Coronel",
                  "reg_id": 8,
                  "com_ind_acti": 0
              },
              "tipoCombustible": {
                  "tico_id": 1,
                  "tico_descripcion": "Leña",
                  "tico_ind_act": 1
              }
            },
        ]

## Usuarios [/usuarios/listar]

### Listar usuarios [GET]

`GET /usuarios/listar` <br>
`Authorization: Bearer <token>`

```
http://tu-url/usuarios/listar
```

Se obtiene la siguiente respuesta:
-   Response 200 (application/json)

        "status": true,
        "message": null,
        "data": [
          {
            "usua_id": 15,
            "usua_nombre": "Usuario",
            "usua_telefono": 56989966325,
            "usua_correo": "usuario@gmail.com",
            "tipe_id": 6,
            "usua_intento_login": 0,
            "updated_at": "31/03/2022 12:26:34",
            "usua_bloqueado": 0,
            "usua_ind_act": 1,
            "usua_token": "",
            "codigo_recuperacion": null,
            "created_at": "2022-02-23 03:51:54",
            "region": [
                {
                    "reg_id": 8,
                    "reg_id_hml": "08",
                    "nombre": "Biobío",
                    "reg_orden": 10,
                    "reg_ind_act": 1
                }
            ],
            "comuna": [
                {
                    "com_id": 8106,
                    "com_id_hml": "08106",
                    "nombre": "Lota",
                    "reg_id": 8,
                    "com_ind_acti": 1
                }
            ],
            "tipoPerfil": {
                "tipe_id": 6,
                "tipe_nombre": "Tarifa Eléctrica",
                "tipe_ind_act": 1
            }
          },
        ]

## DPA [/comunas/comunasRegion]

### Listar comunas DPA [GET]

`GET /comunas/comunasRegion` <br>
`Authorization: Bearer <token>`

```
http://tu-url/comunas/comunasRegion
```

Se obtiene la siguiente respuesta:
-   Response 200 (application/json)

        "status": true,
        "message": null,
        "data": [
          {
              "com_id": 1101,
              "com_id_hml": "01101",
              "com_nombre": "Iquique",
              "reg_id": 1,
              "com_ind_acti": 1,
              "created_at": "2022-03-03 18:16:48",
              "updated_at": "2022-04-08 10:15:00",
              "reg_id_hml": "01",
              "reg_nombre": "Tarapacá",
              "reg_orden": 2,
              "reg_ind_act": 1
          },
          {
              "com_id": 1107,
              "com_id_hml": "01107",
              "com_nombre": "Alto Hospicio",
              "reg_id": 1,
              "com_ind_acti": 1,
              "created_at": "2022-03-03 18:16:48",
              "updated_at": "2022-03-29 02:46:08",
              "reg_id_hml": "01",
              "reg_nombre": "Tarapacá",
              "reg_orden": 2,
              "reg_ind_act": 1
          },
            ...
        ]

## Reportes [/reportes/listar]

### Listar comunas DPA [GET]

`GET /reportes/listar` <br>
`Authorization: Bearer <token>`

```
http://tu-url/reportes/listar
```

Se obtiene la siguiente respuesta:
-   Response 200 (application/json)

        "status": true,
        "message": null,
        "data": [
          {
              "repr_id": 1,
              "repr_detalle": "Parafina",
              "repr_ind_act": 0,
              "tico_id": 4
          },
          {
              "repr_id": 2,
              "repr_detalle": "Gas",
              "repr_ind_act": 0,
              "tico_id": 3
          },
          {
              "repr_id": 3,
              "repr_detalle": "Leña",
              "repr_ind_act": 0,
              "tico_id": 1
          },
          {
              "repr_id": 4,
              "repr_detalle": "Pellet",
              "repr_ind_act": 0,
              "tico_id": 2
          }
        ]
        

<p style="color: red"><strong>
*Importante: La petición a cada API dependerá totalmente del tipo de perfil y parámetros asociados al usuario con el que se realice el acceso inicial.
</strong></p>


