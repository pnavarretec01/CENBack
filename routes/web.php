<?php

use Illuminate\Support\Facades\Route;
use App\Mail\EnvioMail;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => '/usuarios'], function () {
    Route::group(['prefix' => '/inicio'], function () {
        Route::post('/', 'App\Http\Controllers\UsuarioController@Inicio');
        Route::post('/refreshToken', 'App\Http\Controllers\UsuarioController@refreshToken');
    });
    Route::group(['prefix' => '/logout'], function () {
        Route::post('/', 'App\Http\Controllers\UsuarioController@Logout');
    });
});


/**
 * funciones de usuario
 * login/restablecer contraseña
 */

Route::group(['prefix' => '/recuperar'], function () {
    Route::group(['prefix' => '/correo'], function () {
        Route::post('/', 'App\Http\Controllers\EnvioCorreoController@enviarCorreoRecuperacion');
    });
    Route::group(['prefix' => '/setContrasenaNueva'], function () {
        Route::post('/', 'App\Http\Controllers\UsuarioController@setContrasenaNueva');
    });
    Route::group(['prefix' => '/contrasena'], function () {
        Route::post('/', 'App\Http\Controllers\UsuarioController@recuperarContrasena');
    });
    Route::group(['prefix' => '/codigo'], function () {
        Route::post('/', 'App\Http\Controllers\UsuarioController@validarCodigo');
    });
    Route::group(['prefix' => '/token'], function () {
        Route::post('/', 'App\Http\Controllers\UsuarioController@validarToken');
    });
});

Route::group(
    ['middleware' => ['jwt.verify']],
    function () {
        /**
         * regiones
         */
        Route::group(['prefix' => '/regiones'], function () {
            Route::get('/', 'App\Http\Controllers\RegionController@listarRegiones');
            Route::get('/listar', 'App\Http\Controllers\RegionController@listar');
        });
        /**
         * comunas
         */
        Route::group(['prefix' => '/comunas'], function () {
            Route::get('/', 'App\Http\Controllers\ComunaController@listarComunas');
        });
        /**
         * comunas
         */
        Route::group(['prefix' => '/comunas'], function () {
            Route::group(['prefix' => '/comunasRegion'], function () {
                Route::get('/', 'App\Http\Controllers\ComunaController@obtenerComunaConRegion');
            });
            Route::group(['prefix' => '/habilitar'], function () {
                Route::put('/', 'App\Http\Controllers\ComunaController@habilitar');
            });
        });

        /**
         * puntos de venta
         */
        Route::group(['prefix' => '/puntosVenta'], function () {
            Route::get('/', 'App\Http\Controllers\PuntoVentaController@listarPuntosVentas');
            Route::group(['prefix' => '/porId'], function () {
                Route::post('/', 'App\Http\Controllers\PuntoVentaController@listarPuntoVentaPorId');
            });
            Route::group(['prefix' => '/porIdUsuario'], function () {
                Route::post('/', 'App\Http\Controllers\PuntoVentaController@listarPuntoVentaPorIdUsuario');
            });
            Route::group(['prefix' => '/guardar'], function () {
                Route::post('/', 'App\Http\Controllers\PuntoVentaController@guardarPuntoVenta');
            });
            Route::group(['prefix' => '/guardarImagenPuntoVenta'], function () {
                Route::post('/', 'App\Http\Controllers\PuntoVentaController@guardarImagenPuntoVenta');
            });
            Route::group(['prefix' => '/editarImagenPuntoVenta'], function () {
                Route::post('/', 'App\Http\Controllers\PuntoVentaController@editarImagenPuntoVenta');
            });
            Route::group(['prefix' => '/editar'], function () {
                Route::put('/', 'App\Http\Controllers\PuntoVentaController@editarPuntoVenta');
            });
            Route::group(['prefix' => '/habilitar'], function () {
                Route::put('/', 'App\Http\Controllers\PuntoVentaController@habilitar');
            });
            Route::group(['prefix' => '/eliminar'], function () {
                Route::delete('/', 'App\Http\Controllers\PuntoVentaController@eliminar');
            });
        });
        /**
         * tipos de distribucion
         */
        Route::group(['prefix' => '/tiposDistribucion'], function () {
            Route::get('/', 'App\Http\Controllers\TipoDistribucionController@listarTipoDistribucion');
        });
        /**
         * tipos de productos
         */
        Route::group(['prefix' => '/TipoProducto'], function () {
            Route::post('/', 'App\Http\Controllers\TipoProductoController@listarTipoProducto');
        });
        /**
         * Productos
         */
        Route::group(['prefix' => '/productos'], function () {
            Route::group(['prefix' => '/listar'], function () {
                Route::post('/', 'App\Http\Controllers\ClfProductoController@listar');
            });
            Route::group(['prefix' => '/agregar'], function () {
                Route::post('/', 'App\Http\Controllers\ClfProductoController@agregar');
            });
            Route::group(['prefix' => '/editar'], function () {
                Route::put('/', 'App\Http\Controllers\ClfProductoController@editar');
            });
            Route::group(['prefix' => '/eliminar'], function () {
                Route::delete('/', 'App\Http\Controllers\ClfProductoController@eliminar');
            });
            Route::group(['prefix' => '/habilitar'], function () {
                Route::post('/', 'App\Http\Controllers\ClfProductoController@habilitar');
            });
            Route::group(['prefix' => '/habilitarStock'], function () {
                Route::post('/', 'App\Http\Controllers\ClfProductoController@habilitarStock');
            });
        });
        /**
         * tipos de parametros
         */

        Route::group(['prefix' => '/tiposParametros'], function () {
            Route::get('/', 'App\Http\Controllers\TipoParametroController@listarTipoParametro');
        });

        /**
         * Unidad Normalizada
         */
        Route::group(['prefix' => '/unidadNormalizada'], function () {
            Route::group(['prefix' => '/listar'], function () {
                Route::post('/', 'App\Http\Controllers\UnidadNormalizadaController@listar');
            });
            Route::group(['prefix' => '/listarActivo'], function () {
                Route::post('/', 'App\Http\Controllers\UnidadNormalizadaController@listarActivo');
            });
        });
        /**
         * Especie Normalizada
         */
        Route::group(['prefix' => '/especieNormalizada'], function () {
            Route::group(['prefix' => '/listar'], function () {
                Route::post('/', 'App\Http\Controllers\EspecieNormalizadaController@listar');
            });
            Route::group(['prefix' => '/listarActivo'], function () {
                Route::post('/', 'App\Http\Controllers\EspecieNormalizadaController@listarActivo');
            });
        });

        /**
         * medios de pago
         */
        Route::group(['prefix' => '/mediosDePago'], function () {
            Route::get('/', 'App\Http\Controllers\MedioPagoController@listarMedioPago');
        });

        /**
         * funciones de usuario
         * login/recuperar contraseña
         */
        Route::group(['prefix' => '/usuarios'], function () {
            Route::group(['prefix' => '/login'], function () {
                Route::post('/', 'App\Http\Controllers\UsuarioController@Login');
            });
            Route::group(['prefix' => '/logout'], function () {
                Route::post('/', 'App\Http\Controllers\UsuarioController@Logout');
            });
            Route::group(['prefix' => '/verificarCorreo'], function () {
                Route::post('/', 'App\Http\Controllers\UsuarioController@verificarCorreo');
            });
            Route::group(['prefix' => '/setCodigo'], function () {
                Route::post('/', 'App\Http\Controllers\UsuarioController@setCodigo');
            });
            Route::group(['prefix' => '/listar'], function () {
                Route::get('/', 'App\Http\Controllers\UsuarioController@listarUsuarios');
            });
            Route::group(['prefix' => '/listarTipoPerfil'], function () {
                Route::get('/', 'App\Http\Controllers\TipoPerfilController@listar');
            });
            Route::group(['prefix' => '/habilitar'], function () {
                Route::put('/', 'App\Http\Controllers\UsuarioController@habilitar');
            });
            Route::group(['prefix' => '/agregar'], function () {
                Route::post('/', 'App\Http\Controllers\UsuarioController@agregar');
            });
            Route::group(['prefix' => '/editar'], function () {
                Route::put('/', 'App\Http\Controllers\UsuarioController@editar');
            });
            Route::group(['prefix' => '/eliminar'], function () {
                Route::delete('/', 'App\Http\Controllers\UsuarioController@eliminar');
            });
            Route::group(['prefix' => '/me'], function () {
                Route::post('/', 'App\Http\Controllers\UsuarioController@me');
            });
        });

        Route::group(['prefix' => '/validar'], function () {
            Route::group(['prefix' => '/token'], function () {
                Route::post('/', 'App\Http\Controllers\UsuarioController@validarToken');
            });
        });

        /**
         * configurar parametro
         */
        Route::group(['prefix' => '/parametros'], function () {
            Route::group(['prefix' => '/configurarNuevo'], function () {
                Route::post('/', 'App\Http\Controllers\ConfigurarParametroController@configurarParametroGuardar');
            });
            Route::group(['prefix' => '/editar'], function () {
                Route::put('/', 'App\Http\Controllers\ConfigurarParametroController@editarParametroGuardar');
            });
            Route::group(['prefix' => '/eliminar'], function () {
                Route::delete('/', 'App\Http\Controllers\ConfigurarParametroController@eliminar');
            });
            Route::group(['prefix' => '/listar'], function () {
                Route::post('/', 'App\Http\Controllers\ConfigurarParametroController@listarParametros');
            });
            Route::group(['prefix' => '/habilitar'], function () {
                Route::post('/', 'App\Http\Controllers\ConfigurarParametroController@habilitar');
            });
        });

        /**
         * Tarifas
         */
        Route::group(['prefix' => '/tarifas'], function () {
            Route::group(['prefix' => '/listar'], function () {
                Route::get('/', 'App\Http\Controllers\TarifaController@listarTarifas');
            });
            Route::group(['prefix' => '/guardar'], function () {
                Route::post('/', 'App\Http\Controllers\TarifaController@nuevaTarifa');
            });
            Route::group(['prefix' => '/habilitar'], function () {
                Route::put('/', 'App\Http\Controllers\TarifaController@habilitar');
            });
            Route::group(['prefix' => '/editar'], function () {
                Route::put('/', 'App\Http\Controllers\TarifaController@editar');
            });
            Route::group(['prefix' => '/eliminar'], function () {
                Route::delete('/', 'App\Http\Controllers\TarifaController@eliminar');
            });
        });
        /**
         * Reportes
         */
        Route::group(['prefix' => '/reportes'], function () {
            Route::group(['prefix' => '/listar'], function () {
                Route::get('/', 'App\Http\Controllers\ReportePrecioAdminController@listarReportes');
            });
            Route::group(['prefix' => '/habilitar'], function () {
                Route::put('/', 'App\Http\Controllers\ReportePrecioAdminController@habilitar');
            });
        });
        /**
         * Calificaciones
         */
        Route::group(['prefix' => '/calificaciones'], function () {
            Route::group(['prefix' => '/listar'], function () {
                Route::get('/', 'App\Http\Controllers\ClfCalificacionController@listar');
            });
            Route::group(['prefix' => '/habilitar'], function () {
                Route::put('/', 'App\Http\Controllers\ClfCalificacionController@habilitar');
            });
            Route::group(['prefix' => '/eliminar'], function () {
                Route::delete('/', 'App\Http\Controllers\ClfCalificacionController@eliminar');
            });
        });
        /**
         * Parámetros Calificaciones
         */
        Route::group(['prefix' => '/parametrosCalificaciones'], function () {
            Route::group(['prefix' => '/listar'], function () {
                Route::get('/', 'App\Http\Controllers\PrmTipoCalificacionController@listar');
            });
            Route::group(['prefix' => '/habilitar'], function () {
                Route::put('/', 'App\Http\Controllers\PrmTipoCalificacionController@habilitar');
            });
            Route::group(['prefix' => '/agregar'], function () {
                Route::post('/', 'App\Http\Controllers\PrmTipoCalificacionController@agregar');
            });
            Route::group(['prefix' => '/eliminar'], function () {
                Route::delete('/', 'App\Http\Controllers\PrmTipoCalificacionController@eliminar');
            });
        });
        /**
         * Combustibles
         */
        Route::group(['prefix' => '/combustibles'], function () {
            Route::group(['prefix' => '/listar'], function () {
                Route::get('/', 'App\Http\Controllers\TipoCombustibleController@listarCombustibles');
            });
            Route::group(['prefix' => '/habilitar'], function () {
                Route::put('/', 'App\Http\Controllers\TipoCombustibleController@habilitar');
            });
        });
    }
);
