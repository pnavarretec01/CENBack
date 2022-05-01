<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ComunaDAO extends Model
{
    use HasFactory;
    protected $table = 'cut_comuna';
    protected $primaryKey = 'com_id';
    public $timestamps = false;

    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:i:s',
        'updated_at' => 'datetime:d/m/Y H:i:s',
    ];
}
