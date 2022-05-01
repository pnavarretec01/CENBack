<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoParametroDAO extends Model
{
    use HasFactory;
    protected $table = 'prm_parametro_tabla';
    protected $primaryKey = 'param_id';
    public $timestamps = false;
}
