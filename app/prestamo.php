<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prestamo extends Model
{
    // esta linea sirve para vincular el modelo con una tabla.
    protected $table='prestamos';

    // se especifica la clave primaria.
    protected $primaryKey='id_prestamo';

    // cuando no sea un numero la clave primaria y sea un varchar poner el siguiente comando.
    public $incrementing=false;

    // desactiva las etiquetas de tiempo.
    public $timestamps=false;

    // definimos los campos que van a recivir valor de los que se pueden pedir por el usuario.
    protected $fillable=[
    	'id_prestamo',
    	'fecha_salida',
    	'fecha_entrada'
    ];
}
