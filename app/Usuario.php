<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    // esta linea sirve para vincular el modelo con una tabla.
    protected $table='encargados';

    // se especifica la clave primaria.
    protected $primaryKey='id_encargado';

    protected $with=['rol'];

    // cuando no sea un numero la clave primaria y sea un varchar poner el siguiente comando.
    //public $incrementing=false;

    // desactiva las etiquetas de tiempo.
    public $timestamps=false;

    // definimos los campos que van a recivir valor de los que se pueden pedir por el usuario.
    protected $fillable=[
    	'id_encargado',
    	'nombre',
    	'apellido',
    	'password',
    	'celular',
    	'codigo_postal'
    ];

    public function rol()
    {
    	return $this->belongsTo(Rol::class, 'id_rol','id_rol');
    }
}
