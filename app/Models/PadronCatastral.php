<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PadronCatastral extends Model
{
  protected $table = 'padron_catastral';
  protected $primaryKey = 'id';

  protected $fillable = [
    'id',
    'clave_catastral',
    'cum',
    'apellido_paterno',
    'apellido_materno',
    'nombre',
    'denominacion',
    'medida_frente',
    'medida_profundidad',
    'superficie_terreno',
  ];

  public function scopeFindUserByName($query, $name)
  {
    // Concat the name columns and then apply search query on full name
    $query->where(
      DB::raw("REPLACE(CONCAT(COALESCE(nombre,''),' ', COALESCE(apellido_paterno,''),' ', COALESCE(apellido_materno,'')), ' ', ' ')"),
      'like',
      '%' . $name . '%'
    );
  }
}
