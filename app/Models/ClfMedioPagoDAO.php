<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClfMedioPagoDAO extends Model
{
    use HasFactory;
    protected $table = 'clf_medio_pago';
    protected $primaryKey = ['ptv_id', 'timp_id'];
    public $incrementing = false;
    public $timestamps = false;
}
