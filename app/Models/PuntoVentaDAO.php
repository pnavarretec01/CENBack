<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PuntoVentaDAO extends Model
{
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";

    use HasFactory;
    protected $table = 'clf_punto_venta';
    protected $primaryKey = 'ptv_id';
    public $timestamps = true;

    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:i:s',
        'updated_at' => 'datetime:d/m/Y H:i:s',
    ];
}
