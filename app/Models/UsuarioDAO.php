<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Laravel\Lumen\Auth\Authorizable;

class UsuarioDAO extends Authenticatable implements JWTSubject
{
    const CREATED_AT = "updated_at";
    const UPDATED_AT = "updated_at";

    use HasFactory,Notifiable;
    protected $table = 'clf_usuario';
    protected $primaryKey = 'usua_id';
    public $timestamps = true;

    protected $fillable = ['usua_id','usua_nombre', 'usua_telefono', 'usua_correo',
        'usua_clave', 'tipe_id','usua_intento_login','usua_bloqueado','usua_ind_act'];

    protected $hidden = ['usua_clave'];

    protected $casts = [
        'updated_at' => 'datetime:d/m/Y H:i:s',
        'updated_at' => 'datetime:d/m/Y H:i:s',
    ];

    public function getAuthPassword()
    {
        return $this->usua_clave;
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

}
