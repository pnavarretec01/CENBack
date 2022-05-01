<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnidadNormalizadaDAO extends Model
{
    use HasFactory;
    protected $table = 'prm_unidad_normalizada';
    protected $primaryKey = 'tiun_id';
    public $timestamps = false;
}
