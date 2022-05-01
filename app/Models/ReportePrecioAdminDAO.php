<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReportePrecioAdminDAO extends Model
{
    use HasFactory;
    protected $table = 'clf_reporte_precio_admin';
    protected $primaryKey = 'repr_id';
    public $timestamps = false;
}
