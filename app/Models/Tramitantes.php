<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tramitantes extends Model
{
  use HasFactory;

  protected $table = 'tramitante';
  protected $primaryKey = 'id';

  protected $fillable = [
    'id',
    'nombre',
    'id_tramite_proceso',
    'calle',
    'localidad',
    'poblacion',
    'numero',
    'codigo_postal',
    'telefono'
  ];

  protected $hidden = [
    'created_at', 'updated_at',
  ];
}
