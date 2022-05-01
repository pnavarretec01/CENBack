<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TarifaElectricaDAO extends Model
{
    use HasFactory;
    protected $table = 'clf_tarifa_electrica';
    protected $primaryKey = 'tari_id';
    public $timestamps = true;

    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:i:s',
        'updated_at' => 'datetime:d/m/Y H:i:s',
    ];
}
