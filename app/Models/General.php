<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    protected $table = 'generales';

    protected $primaryKey = 'id';

    protected $fillable = [
      'id',
      'clave_catastral',
      'tipo_predio',
      'tarjeta',
      'folio_real',
      'fecha_alta',
      'ultimo_movimiento_catastral',
      'fecha_ultimo_movimiento_catastral',
    ];
}
