<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoTramite extends Model
{
    protected $table = 'tipo_tramites';
    protected $primaryKey = 'id';

    protected $fillable = [
      'id',
      'nombre',
      'descripcion',
      'route'
    ];
}
