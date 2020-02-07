<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lector;

class lectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lectores=lector::all();
        return $lectores;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lectores=new lector;
        $lectores->id_lector=$request->get('id_lector');
        $lectores->nombre=$request->get('nombre');
        $lectores->apellidos=$request->get('apellidos');
        $lectores->telefono=$request->get('telefono');
        $lectores->direccion=$request->get('direccion');
        $lectores->codigo_postal=$request->get('codigo_postal');

        $lectores->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lectores=lector::find($id);
        return $lectores;
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
        $lectores=lector::find($id);

        $lectores->id_lector=$request->get('id_lector');
        $lectores->nombre=$request->get('nombre');
        $lectores->apellidos=$request->get('apellidos');
        $lectores->telefono=$request->get('telefono');
        $lectores->direccion=$request->get('direccion');
        $lectores->codigo_postal=$request->get('codigo_postal');
        $lectores->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return lector::destroy($id);
    }
}
