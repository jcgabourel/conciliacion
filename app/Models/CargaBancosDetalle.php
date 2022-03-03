<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargaBancosDetalle extends Model
{
    use HasFactory;
    protected $fillable = [
        'carga_bancos_id',
        'fecha',
        'descripcion',
        'cargo',
        'abono',
        'saldo'
    ];

    protected $table = 'carga_bancos_detalle';
}
