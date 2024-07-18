<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TramitesProceso extends Model
{
    protected $table = 'tramites_proceso';
    protected $primaryKey = 'id';

    protected $fillable = [
      'id',
      'id_padron_catastral',
      'id_tipo_tramite',
      'id_tipo_proceso',
      'id_uso_suelo',
      'nooficial',
      'elaboro',
      'reviso',
      'certifico',
      'entrega',
      'historico',
    ];
}
