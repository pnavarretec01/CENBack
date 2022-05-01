<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoProductoDAO extends Model
{
    use HasFactory;
    protected $table = 'prm_tipo_producto';
    protected $primaryKey = 'tipr_id';
    public $timestamps = false;
}
