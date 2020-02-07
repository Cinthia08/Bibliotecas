<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\encargado;
use Session;
use Redirect;
use Cache;
use Cookie;


class AccesoController extends Controller

{
    public function validar(Request $request){
    	// return "Hola";

    	$encargados=$request->encargado;
    	$password=$request->password;

    	$resp = encargado::where('id_encargado','=',$encargados)
    	->where('password','=',$password)
    	->get();

    	//return $resp[0]->rol->rol;
    	$encargados=$resp[0]->nombre.' '.$resp[0]->apellido;

    	// CASO JSON LLENO
    	if (count($resp)>0)
        {
            Session::put('encargado',$encargados);
            Session::put('rol',$resp[0]->rol->rol);
            Session::put('foto',$resp[0]->foto);
            // return $resp;

    		if ($resp[0]->rol->rol=="Administrador")
                return Redirect::to('admin');
    		elseif ($resp[0]->rol->rol=="Encargado") 
    			return Redirect::to('admin');
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
