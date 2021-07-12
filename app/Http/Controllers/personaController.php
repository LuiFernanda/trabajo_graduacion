<?php

namespace App\Http\Controllers;

use App\Models\estado;
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
            'cui' => 'required|size:13|unique:personas',
            'name' =>'required',
            'gender' => 'required',
            'address' => 'required',
            'date' => 'required',
            'cel' => 'required|size:8'
        ]);

        $persona = persona::create([
        'cui' => $request->input('cui'),
        'nombre_completo' => $request->input('name'),
        'direccion' => $request->input('address'),
        'genero' => $request->input('gender'),
        'fecha_nac' => $request->input('date'),
        'no_tel' => $request->input('cel')
        ]);
        return;
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
        return persona::find($id);
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search($id)
    {
        //mostrar datos de una sola persona
        $persona = new persona();
        $persona = persona::where('cui', 'like', $id.'%')->get();
        return $persona;
    }
    
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchCui($id)
    {
        //mostrar datos de una sola persona
        $persona = new persona();
        $persona = persona::where('cui', 'like', $id.'%')->first();
        return $persona;
    }
    

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function estado($id)
    {
        //mostrar datos de una sola persona
        $persona = new persona();
        $persona = persona::find($id);
        return $persona->estado;
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
        $this->validate($request, [
            'cui' => 'required|size:13',
            'name' =>'required',
            'gender' => 'required',
            'address' => 'required',
            'date' => 'required',
            'cel' => 'required|size:8'
        ]);
        $persona = persona::find($id);
        $persona->cui = $request->cui;
        $persona->nombre_completo = $request->name;
        $persona->genero = $request->gender;
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