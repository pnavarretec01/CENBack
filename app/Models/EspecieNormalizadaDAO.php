<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EspecieNormalizadaDAO extends Model
{
    use HasFactory;
    protected $table = 'prm_especie_normalizada';
    protected $primaryKey = 'tien_id';
    public $timestamps = false;
}
