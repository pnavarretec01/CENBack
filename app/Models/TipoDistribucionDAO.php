<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoDistribucionDAO extends Model
{
    use HasFactory;
    protected $table = 'prm_tipo_distribucion';
    protected $primaryKey = 'tidi_id';
    public $timestamps = false;
}
