<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedioPagoDAO extends Model
{
    use HasFactory;
    protected $table = 'prm_tipo_medio_pago';
    protected $primaryKey = 'timp_id';
    public $timestamps = false;
}
