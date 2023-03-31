<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Ticket;
use App\Http\Requests\validadorCliente;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;
use PDF;
use Exception;
use FontLib\Table\Type\name;

class ControladorPDF extends Controller
{

    /*          Funciones de PDF            */
    
    /* TODOS LOS TICKETS */
    public function pdf(){
        
        //Consultas para el PDF
        $tickets = DB::table('tb_tickets')
        ->select('users.name', 'users.apellido', 'tb_tickets.clasificacion', 
        'tb_tickets.detalle', 'tb_tickets.estatus', 'tb_tickets.created_at',
        'tb_tickets.updated_at')
        ->join('users','users.id','=','tb_tickets.id_usu')

        ->get();

        $count = DB::table('tb_tickets')->count();

        $usu = Auth::user();
        //Generar PDF
        $pdf = PDF::loadView('pdf.pdf_reporte_tickets',compact('tickets','usu', 'count'));
        // return $pdf->download();
        return $pdf->stream();

     }

     public function pdf_clasificacion(Request $r){
        $cls = $r->txtClasificacion;
        //Consultas para el PDF
        $tickets = DB::table('tb_tickets')
        ->select('users.name', 'users.apellido', 'tb_tickets.clasificacion', 
        'tb_tickets.detalle', 'tb_tickets.estatus', 'tb_tickets.created_at',
        'tb_tickets.updated_at')
        ->join('users','users.id','=','tb_tickets.id_usu')
        ->where('tb_tickets.clasificacion','=',$cls)
        ->get();

        $count = DB::table('tb_tickets')->where('tb_tickets.clasificacion','=',$cls)->count();

        $usu = Auth::user();
        //Generar PDF
        $pdf = PDF::loadView('pdf.pdf_reporte_tickets',compact('tickets','usu','count'));
        // return $pdf->download();
        return $pdf->stream();
        
   
     }

     public function pdf_fechas(Request $r){
      $fechas= $r->fechas;
      //Consulta para el pdf
      $tickets = DB::table('tb_tickets')
      ->select('users.name', 'users.apellido', 'tb_tickets.clasificacion', 
      'tb_tickets.detalle', 'tb_tickets.estatus', 'tb_tickets.created_at',
      'tb_tickets.updated_at')
      ->join('users','users.id','=','tb_tickets.id_usu')
      ->whereDate('tb_tickets.created_at', $fechas)
      ->get();

      $count = DB::table('tb_tickets')->whereDate('tb_tickets.created_at', $fechas)->count();

      $usu = Auth::user();
      //Generar PDF
      $pdf = PDF::loadView('pdf.pdf_reporte_tickets',compact('tickets','usu','count'));
      // return $pdf->download();
      return $pdf->stream(); 
     }

     public function pdf_estatus(Request $r){
      $estatus= $r->estatuss;
      //Consulta para el pdf
      $tickets = DB::table('tb_tickets')
      ->select('users.name', 'users.apellido', 'tb_tickets.clasificacion', 
      'tb_tickets.detalle', 'tb_tickets.estatus', 'tb_tickets.created_at',
      'tb_tickets.updated_at')
      ->join('users','users.id','=','tb_tickets.id_usu')
      ->where('tb_tickets.estatus', $estatus)
      ->get();

      $count = DB::table('tb_tickets')->whereDate('tb_tickets.estatus', $estatus)->count();

      $usu = Auth::user();
      //Generar PDF
      $pdf = PDF::loadView('pdf.pdf_reporte_tickets',compact('tickets','usu','count'));
      // return $pdf->download();
      return $pdf->stream(); 
     }

}
?>