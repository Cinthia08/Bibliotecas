<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\libro;

class libroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros=libro::all();
        return $libros;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $libros=new libro;
        $libros->id_libro=$request->get('id_libro');
        $libros->titulo=$request->get('titulo');
        $libros->no_pagina=$request->get('no_pagina');
        $libros->anio_edicion=$request->get('anio_edicion');

        $libros->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libros=libro::find($id);
        return $libros;
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
        $libros=libro::find($id);

        $libros->id_libro=$request->get('id_libro');
        $libros->titulo=$request->get('titulo');
        $libros->no_pagina=$request->get('no_pagina');
        $libros->anio_edicion=$request->get('anio_edicion');
        $libros->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return libro::destroy($id);
    }
}
