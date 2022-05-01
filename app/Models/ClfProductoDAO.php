<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClfProductoDAO extends Model
{
    use HasFactory;
    protected $table = 'clf_producto';
    protected $primaryKey = 'prod_id';
    public $timestamps = false;
}
