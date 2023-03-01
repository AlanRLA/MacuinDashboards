<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Ticket;
use App\Http\Requests\validadorCliente;
use DB;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

class ControladorMacuin_Vistas extends Controller
{
    //VISTA LOGIN
    public function loginInicio(){
        return view('login');
    }

    //VISTA REGISTRO USUARIO
    public function registrarUsu(){
        return view('registrarUsuario');
    }

    //VISTA CLIENTE Y JEFE DE SOPORTE
    public function indexCliente()
    {
        $deptos = DB::table('tb_departamentos')->get();
        $tickets = DB::table('tb_tickets')->where('estatus','<>','Cancelado')->where('id_usu','=',Auth::user()->id)->get();
        return view('cliente',compact('deptos','tickets'));
    }

     //VISTA JEFE SOPORTE
     public function consultaDepa(){
        $depa = DB::table('tb_departamentos')->get();

        return view('soporte', compact('depa'));
     }

}
