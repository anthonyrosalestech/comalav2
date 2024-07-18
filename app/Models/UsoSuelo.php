<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsoSuelo extends Model
{
    protected $table = 'uso_suelo';
    protected $primaryKey = 'id';

    protected $fillable = [
      'id',
      'zona',
      'nomenclatura',
      'uso_suelo',
      'cos',
      'cus',
    ];
}
