<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoCombustibleDAO extends Model
{
    use HasFactory;
    protected $table = 'prm_tipo_combustible';
    protected $primaryKey = 'tico_id';
    public $timestamps = false;

}
