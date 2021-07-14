<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function store(Request $request)
    {
        //Insercion de datos dentro de la base de datos
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        return User::create([
            'name' => $request['name'],
            'tipo' => $request['tipo'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
    }
    public function update(Request $request, $id)
    {
        //Registramos la modificacion de los datos
        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255']
        ]);
        $persona = User::find($id);
        $persona->cui = $request->cui;
        $persona->nombre_completo = $request->name;
        $persona->genero = $request->gender;
        $persona->direccion = $request->address;
        $persona->fecha_nac = $request->date;
        $persona->no_tel = $request->cel;
        $persona->save();
    }
}
