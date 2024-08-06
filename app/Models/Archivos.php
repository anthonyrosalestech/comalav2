<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivos extends Model
{
    use HasFactory;

    protected $table = 'archivos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'id_tramite_proceso',
        'clave_catastral',
        'nombre',
        'url',
        'created_at',
        'updated_at',
    ];
}
