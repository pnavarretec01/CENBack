<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClfDistribucionDAO extends Model
{
    use HasFactory;
    protected $table = 'clf_distribucion';
    protected $primaryKey = ['ptv_id', 'tidi_id'];
    public $incrementing = false;
    public $timestamps = false;
}
