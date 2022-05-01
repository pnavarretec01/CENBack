<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClfUsuarioDpaDAO extends Model
{
    use HasFactory;
    protected $table = 'clf_usuario_dpa';
    protected $primaryKey = ['usua_id', 'reg_id', 'com_id'];
    public $incrementing = false;
    public $timestamps = false;
}
