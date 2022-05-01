<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClfCalificacionDAO extends Model
{
    use HasFactory;
    protected $table = 'clf_calificacion';
    protected $primaryKey = 'cali_id';
    public $incrementing = false;
    public $timestamps = true;

    protected $casts = [
        'updated_at' => 'datetime:d/m/Y H:i:s',
        'updated_at' => 'datetime:d/m/Y H:i:s',
    ];
}
