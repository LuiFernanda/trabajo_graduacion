<?php

namespace App\Http\Controllers;

use App\Models\persona;
use Illuminate\Http\Request;

class personaController extends Controller
{
    public function show($nombre){
        return persona::select('nombre_completo', 'cui', 'direccion', 'no_tel', 'fecha_nac')->where('nombre_completo', $nombre)->get();
    }
}
