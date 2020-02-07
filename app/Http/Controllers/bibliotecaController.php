<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\biblioteca;

class bibliotecaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bibliotecas=biblioteca::all();
        return $bibliotecas;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bibliotecas=new biblioteca;
        $bibliotecas->id_biblioteca=$request->get('id_biblioteca');
        $bibliotecas->nombre=$request->get('nombre');
        $bibliotecas->domicilio=$request->get('domicilio');
        $bibliotecas->dias_abierto=$request->get('dias_abierto');
        $bibliotecas->horario_abierto=$request->get('hora_abierto');
        $bibliotecas->horario_cerrado=$request->get('hora_cerrado');

        $bibliotecas->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bibliotecas=biblioteca::find($id);
        return $bibliotecas;
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

         $bibliotecas=biblioteca::find($id);

        $bibliotecas->id_biblioteca=$request->get('id_biblioteca');
        $bibliotecas->nombre=$request->get('nombre');
        $bibliotecas->domicilio=$request->get('domicilio');
        $bibliotecas->dias_abierto=$request->get('dias_abierto');
        $bibliotecas->horario_abierto=$request->get('horario_abierto');
        $bibliotecas->horario_cerrado=$request->get('horario_cerrado');
        $bibliotecas->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return biblioteca::destroy($id);
    }
}
