<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\estado;

class persona extends Model
{
    //use HasFactory;
    protected $fillable = ['cui', 'nombre_completo', 'direccion', 'genero', 'fecha_nac', 'no_tel'];
    
    public function estado(){
        
        return $this->hasOne(estado::class);
    }
}
