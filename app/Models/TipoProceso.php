<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoProceso extends Model
{
    protected $table = 'tipo_procesos';
    protected $primaryKey = 'id';

    protected $fillable = [
      'id',
      'nombre',
      'descripcion',
    ];
}
