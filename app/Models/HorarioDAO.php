<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HorarioDAO extends Model
{
    use HasFactory;
    protected $table = 'clf_horario_atencion';
    protected $primaryKey = 'hrat_id';
    public $timestamps = false;
}
