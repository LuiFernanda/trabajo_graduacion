<?php

namespace App\Http\Controllers;

use App\Models\persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mostramos los datos
        $persona = persona::all();
        return $persona;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Insercion de datos dentro de la base de datos
        $this->validate($request, [
            'cui' => 'required|max:13|min:13',
            'name' =>'required',
            'address' => 'required',
            'date' => 'required',
            'cel' => 'required|max:8|min:8'
        ]);

        $persona = persona::create([
        'cui' => $request->input('cui'),
        'nombre_completo' => $request->input('name'),
        'direccion' => $request->input('address'),
        'fecha_nac' => $request->input('date'),
        'no_tel' => $request->input('cel')
        ]);
        return $persona;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //mostrar datos de una sola persona
        return $id;
        //return persona::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Registramos la modificacion de los datos
        $persona = persona::find($id);
        $persona->cui = $request->cui;
        $persona->nombre_completo = $request->name;
        $persona->direccion = $request->address;
        $persona->fecha_nac = $request->date;
        $persona->no_tel = $request->cel;
        $persona->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}