<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use App\Models\estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'id' => 'required'
        ]);
        $estado = estado::create([
            'estado' => $request->input('positivo'),
            'cuarentena' => $request->input('cuarentena'),
            'persona_id' => $request->input('id'),
            'alta' => $request->input("alta")
            ]);
            return $estado;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //listar datos
        return estado::where([
            ['persona_id', '=', $id],
            ['alta', '=', null]
        ])->get();
    }
    
    public function search($id)
    {
        //listar datos
        $estado = new estado();
        $estado = estado::find($id);
        return $estado->persona;
    }
    
    public function status()
    {
        //listar datos
        $estado  = estado::where('estado', 1)
        ->where('alta', '=', null)
        ->count();
        $suma = ["estado" => $estado];

        $cuarentena  = estado::where('cuarentena', 1)
        ->where('alta', '=', null)
        ->count();
        $suma =  Arr::add($suma, 'cuarentena', $cuarentena);
        $alta  = estado::where('alta', 1)
        ->count();
        $suma =  Arr::add($suma, 'alta', $alta);
        return $suma;
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
        //
        $estado = estado::find($id);
        $estado->estado = $request->positivo;
        $estado->cuarentena = $request->cuarentena;
        $estado->alta = $request->alta;
        $estado->save();
        return $estado;
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
