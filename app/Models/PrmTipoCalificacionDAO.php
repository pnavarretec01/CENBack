<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PrmTipoCalificacionDAO extends Model
{
    use HasFactory;
    protected $table = 'prm_tipo_calificacion';
    protected $primaryKey = 'tpcl_id';
    public $incrementing = false;
    public $timestamps = false;
}
