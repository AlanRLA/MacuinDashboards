<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Ticket;
use App\Http\Requests\validadorCliente;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
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

        $deptos = DB::table('tb_departamentos')->where('estatus','1')->get();
        $tickets = DB::table('tb_tickets')->where('estatus','<>','Cancelado')->where('id_usu','=',Auth::user()->id)->get();
        
        $tickets2 = DB::table('tb_tickets')
        ->select('tb_soportes.id_soporte', 'aux.name', 'aux.apellido', 'tb_tickets.id_ticket', 'tb_tickets.id_usu', 'tb_tickets.detalle', 'tb_soportes.detalle_aux', 'tb_tickets.clasificacion', 'tb_tickets.estatus', 'tb_tickets.created_at', 'tb_soportes.id_aux', 'tb_soportes.updated_at')
        ->leftJoin('tb_soportes','tb_tickets.id_ticket','=','tb_soportes.id_ticket')
        ->leftJoin('users as aux','tb_soportes.id_aux','=','aux.id')
        ->where ('tb_tickets.estatus','<>','Cancelado')
        ->where ('tb_tickets.id_usu','=',Auth::user()->id)
        ->get();

        $d_ticket = DB::table('tb_tickets')->where('estatus','<>','Cancelado')->where('id_usu','=',Auth::user()->id)->get();

        return view('cliente',compact('deptos','tickets','tickets2','d_ticket'));
    }

     //VISTA JEFE SOPORTE
     public function consultaDepa(){

        

        $tick = DB::table('tb_tickets')
        ->crossJoin('users')
        ->crossJoin('tb_departamentos')
        ->select('tb_tickets.id_ticket', 'users.name', 'tb_departamentos.nombre', 'tb_tickets.created_at', 'tb_tickets.clasificacion', 'tb_tickets.detalle', 'tb_tickets.estatus')
        ->where('tb_tickets.id_usu','=',DB::raw('users.id'))
        ->where('tb_tickets.id_dpto','=',DB::raw('tb_departamentos.id_dpto'))
        ->get();

        $usu = DB::table('users')
        ->crossJoin('tb_departamentos')
        ->select('users.id','users.name', 'tb_departamentos.nombre')
        ->where('users.id_dpto','=',DB::raw('tb_departamentos.id_dpto'))
        ->get();

        $estatus = DB::table('tb_tickets')
        ->select('estatus')
        ->groupBy('estatus')
        ->get();

        $dates = DB::table('tb_tickets')
            ->selectRaw('DATE(created_at) as Date')
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get();

        
        if(Auth::user()->perfil == null||Auth::user()->perfil == 'auxiliar'){
            return redirect()->route('cliente_rs')->with('no se puede','cancel');
        }

        $depa = DB::table('tb_departamentos')
        ->where('estatus','1')
        ->get();

        $auxs = DB::table('users')->where('perfil','=','auxiliar')->get();
        
        return view('soporte', compact('depa','tick','usu','estatus','auxs','dates'));
     }

     public function indexAuxiliar(){

        $id_aux = Auth::user()->id;

        $estatus = DB::table('tb_tickets')
            ->join('tb_soportes','tb_soportes.id_ticket','=','tb_tickets.id_ticket')
            ->selectRaw(DB::raw('tb_tickets.estatus'))
            ->where('tb_soportes.id_aux','=',Auth::user()->id)
            ->groupBy(DB::raw('tb_tickets.estatus'))
            ->get();

        $dates = DB::table('tb_tickets')
            ->selectRaw('DATE(created_at) as Date')
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get();
        
        $tickets = DB::table('tb_soportes')
            ->select('tb_soportes.id_soporte', 'tb_soportes.id_aux', DB::raw("CONCAT(`users`.`name`, ' ', `users`.`apellido`) as nombre"), 'tb_tickets.detalle', 'tb_soportes.updated_at', 'users.email', 'tb_soportes.id_ticket', 'tb_departamentos.nombre as dpto', 'tb_soportes.observaciones', 'tb_soportes.detalle_aux', 'tb_tickets.clasificacion', 'tb_tickets.estatus', 'tb_tickets.created_at as fecha')
            ->join('tb_tickets','tb_soportes.id_ticket','=','tb_tickets.id_ticket')
            ->join('tb_departamentos','tb_tickets.id_dpto','=','tb_departamentos.id_dpto')
            ->join('users','tb_tickets.id_usu','=','users.id')
            ->where('tb_soportes.id_aux', '=', $id_aux)
            ->get();

        $departs = DB::table('tb_departamentos')
            ->select('tb_departamentos.id_dpto','tb_departamentos.nombre')
            ->join('tb_tickets','tb_departamentos.id_dpto','=','tb_tickets.id_dpto')
            ->join('tb_soportes','tb_soportes.id_ticket','=','tb_tickets.id_ticket')
            ->where('tb_soportes.id_aux','=',Auth::user()->id)
            ->where('tb_departamentos.estatus','=','1')
            ->groupBy(DB::raw('tb_departamentos.nombre'),DB::raw('tb_departamentos.id_dpto'))
            ->get();

        return view('auxiliar',compact('estatus','dates','departs','tickets'));

        
        // return view('auxiliar',compact('estatus','dates', 'tickets'));

        //     ->join('tb_soportes','tb_soportes.id_ticket','=','tb_tickets.id_ticket')
        //     ->selectRaw(DB::raw('DATE(tb_tickets.created_at) as Date'))
        //     ->where('tb_soportes.id_aux','=',Auth::user()->id)
        //     ->groupBy(DB::raw('DATE(tb_tickets.created_at)'))
        //     ->get();
     }

}
?>
