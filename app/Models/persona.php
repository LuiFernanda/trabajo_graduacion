<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class persona extends Model
{
    //use HasFactory;
    protected $fillable = ['cui', 'nombre_completo', 'direccion', 'genero', 'fecha_nac', 'no_tel'];
}
