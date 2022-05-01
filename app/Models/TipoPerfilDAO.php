<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoPerfilDAO extends Model
{
    use HasFactory;
    protected $table = 'prm_tipo_perfil';
    protected $primaryKey = 'tipe_id';
    public $timestamps = false;
}
