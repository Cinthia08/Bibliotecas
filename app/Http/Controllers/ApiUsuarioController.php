<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Session;
use Redirect;
use Cache;
use Cookie;

class ApiUsuarioController extends Controller
{
    public function validar(Request $request){
    	// return "Hola";

    	$encargado=$request->username;
    	$password=$request->pass;

    	$resp = Usuario::where('nombre','=',$encargado)
    	->where('password','=',$password)
    	->get();

    	

    	// CASO JSON LLENO
    	if (count($resp)>0)
        {
            $encargado=$resp[0]->nombre.' '.$resp[0]->apellido;
            Session::put('nombre',$encargado);
            Session::put('rol',$resp[0]->rol->rol);
            Session::put('id_encargado',$resp[0]->id_encargado);
            Session::put('foto',$resp[0]->foto);

    		if ($resp[0]->rol->rol=="Administrador")
                return Redirect::to('vis');
    		elseif ($resp[0]->rol->rol=="Encargado") 
    			return Redirect::to('vis');
        }    
    		
    	// CASO JSON VACIO
    	else
    	{
    			return "USUARIO Y CONTRASEÑA INCORRECTA";
    		
    	}		
    }

     public function salir(){
        Session::flush();
        Session::reflash();
        Cache::flush();
        Cookie::forget('laravel_session');
        unset($_COOKIE);
        unset($_SESSION);
        return Redirect::to('/');
    }
}
