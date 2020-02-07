<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\prestamo;


class prestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestamos=prestamo::all();
        return $prestamos;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prestamos=new prestamo;
        $prestamos->id_prestamo=$request->get('id_prestamo');
        $prestamos->fecha_salida=$request->get('fecha_salida');
        $prestamos->fecha_entrada=$request->get('fecha_entrada');

        $prestamos->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prestamos=prestamo::find($id);
        return $prestamos;
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
        $prestamos=prestamo::find($id);

        $prestamos->id_prestamo=$request->get('id_prestamo');
        $prestamos->fecha_salida=$request->get('fecha_salida');
        $prestamos->fecha_entrada=$request->get('fecha_entrada');
        $prestamos->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return prestamo::destroy($id);
    }
}
