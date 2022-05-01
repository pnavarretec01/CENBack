<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RegionDAO extends Model
{
    use HasFactory;
    protected $table = 'cut_region';
    protected $primaryKey = 'reg_id';
    public $timestamps = false;

}
