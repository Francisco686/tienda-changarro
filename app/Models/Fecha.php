<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{
    use HasFactory;

    protected $table = 'fechas';

    protected $primaryKey = 'id_fecha';

    protected $fillable = [
        'fecha',
    ];
}
