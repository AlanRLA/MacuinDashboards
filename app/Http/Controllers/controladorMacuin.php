<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Ticket;
use DB;
use Carbon\Carbon;

class controladorMacuin extends Controller
{


    //FUNCIONES LOGIN
    public function loginInicio(){
        return view('login');
    }

    public function registrarUsu(){
        return view('registrarUsuario');
    }

    //FUNCIONES INDEX (CLIENTE, J-SOPORTE Y AUXILIAR)
    public function indexCliente()
    {
        $deptos = DB::table('tb_departamentos')->get();
        $tickets = DB::table('tb_tickets')->where('estatus','<>','Cancelado')->get();
        return view('macuinCliente',compact('deptos','tickets'));
    }

    public function insertTicket(Ticket $request)
    {
        if ($request->input('txtClasificacion') !== "Otro:"){
            DB::table('tb_tickets')->insert([
                "id_usu"=>1,
                "id_dpto"=>$request->input('txtDepartamento'),
                "clasificacion"=>$request->input('txtClasificacion'),
                "detalle"=>$request->input('txtDescripcion'),
                "estatus"=>"Solicitado",
                "created_at"=>Carbon::now(),
                "updated_at"=>Carbon::now()
            ]);
            return redirect('cliente')->with('ticket','tick');
        } else{
            DB::table('tb_tickets')->insert([
                "id_usu"=>1,
                "id_dpto"=>$request->input('txtDepartamento'),
                "clasificacion"=>$request->input('txtCual'),
                "detalle"=>$request->input('txtDescripcion'),
                "estatus"=>"Solicitado",
                "created_at"=>Carbon::now(),
                "updated_at"=>Carbon::now()
            ]);
            return redirect('cliente')->with('ticket','tick');
        }
    }

    public function cancelTicket (Request $req, $id){
        
        DB::table('tb_tickets')->where('id_ticket',$id)->update([
            "estatus"=>"Cancelado",
            "updated_at"=>Carbon::now(),
        ]);
        return redirect('cliente')->with('cancelacion','cancel');
        
    }


    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
