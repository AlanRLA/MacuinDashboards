<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Ticket;
use App\Http\Requests\RegisUsu;
use App\Http\Requests\Login;
use App\Http\Requests\regisJeyAu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

class controladorMacuin extends Controller
{
    //AUTENTIFICACION
    public function login_v(Login $r){

        if(Auth::attempt(['email'=>$r->txtemail,'password'=>$r->txtpass])){
            //Enviar el email
            if(Auth::user()->perfil == 'cliente'){
                
               return redirect()->route('cliente_rs');    
            }
            if(Auth::user()->perfil == 'Jefe de Soporte'){
                
                return redirect()->route('soporte_bo');    
            }
            if(Auth::user()->perfil == 'Auxiliar'){
                

                //return view('auxiliar');
                return redirect()->route('auxiliar_rs');  

            }         
        }     
        return back()->withErrors(['invalid_credentials'=>'Usuario y/o contraseña no coinciden'])->withInput();
    }

    //LOGOUT
    public function salir(){
        Auth::logout();
        return redirect()->route('login');
    }

    //REGISTRO DE USUARIO
    public function  registrar_v(RegisUsu $r){  

        User::create([
            'name' => $r->txtusu,
            'email' => $r->txtemail,
            'perfil' => "cliente",
            'password' => bcrypt($r->txtpass),
        ]);

    return redirect()->route('login')->with('success', 'Registrado');
    }

    //REGISTRAR USUARIO JEFE Y AUXILIAR
    public function  registrarUsuario(regisJeyAu $r){  

        User::create([
            'name' => $r->txtNameUsu,
            'email' => $r->txtemailUsu,
            'password' => bcrypt("1234"),
            'perfil' => $r->txtPerfil,
            'id_dpto' => $r->txtDeparta,
        ]);

    return redirect()->route('soporte_bo')->with('successUsuario', 'Registrado');
    }

 
    //FUNCION EDITAR PERFIL
    public function editarPerfil(Request $r, $id){

            $usu = User::findOrFail($id); // Buscar el usuario en la base de datos
    
            $usu->name = $r->txtNombre;
            $usu->apellido = $r->txtApellido;

            $image = $r->file('imgPerfil');

            $perfil = Auth::user()->perfil;

            //IMG
            if ($image) {
                $filename = uniqid('profile_') . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('profiles', $filename, 'public');
                $usu->img_perfil = $path;
            }

            $usu->email = $r->txtEmail;
            $usu->updated_at = Carbon::now();
    
            $usu->save(); //Actualizar
            
            //Redireccion OP
            if ($perfil == 'cliente'){
                return redirect()->route('cliente_rs')->with('save','editado');
            }else{
                if ($perfil == 'Auxiliar'){
                    return redirect()->route('auxiliar_rs')->with('save','editado');
                }else{
                    return redirect()->route('soporte_bo')->with('save','editado');
                }
            }

    }
 

    //FUNCION INSERTAR TICKET CLIENTE
    public function insertTicket(Ticket $request)
    {

        if ($request->input('txtClasificacion') !== "Otro:"){
            DB::table('tb_tickets')->insert([
                "id_usu"=>Auth::user()->id,
                "id_dpto"=>$request->input('txtDepartamento'),
                "clasificacion"=>$request->input('txtClasificacion'),
                "detalle"=>$request->input('txtDescripcion'),
                "estatus"=>"Solicitado",
                "created_at"=>Carbon::now(),
                "updated_at"=>Carbon::now()
            ]);

            return redirect()->route('cliente_rs')->with('hecho','no hecho');

        return redirect()->route('cliente_rs')->with('firado','no hecho');

        } else{
            DB::table('tb_tickets')->insert([
                "id_usu"=>Auth::user()->id,
                "id_dpto"=>$request->input('txtDepartamento'),
                "clasificacion"=>$request->input('txtCual'),
                "detalle"=>$request->input('txtDescripcion'),
                "estatus"=>"Solicitado",
                "created_at"=>Carbon::now(),
                "updated_at"=>Carbon::now()
            ]);
            return redirect()->route('cliente_rs')->with('hecho','no hecho');

        }
    }

    //FUNCION CANCELAR TICKET
    public function cancelTicket ($id){
        
        DB::table('tb_tickets')->where('id_ticket',$id)->update([
            "estatus"=>"Cancelado",
            "updated_at"=>Carbon::now(),
        ]);
        return redirect()->route('cliente_rs')->with('cancelacion','cancel');
        
    }

    //FUNCION INSERTAR DEPARTAMENTO
    public function insertDpto(Request $r){
        DB::table('tb_departamentos')->insert([
            "nombre"=>$r->txtNombre,
            "telefono"=>$r->txtTel,
            "ubicacion"=>$r->txtUbi,
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now()

        ]);

        return redirect()->route('soporte_bo')->with('regis','registrado');

    }
    
    //FUNCION EDITAR DEPARTAMENTO
    public function editarDpto(Request $r, $id){
        DB::table('tb_departamentos')->where('id_dpto',$id)->update([
            "nombre"=>$r->txtNombre,
            "telefono"=>$r->txtTel,
            "ubicacion"=>$r->txtUbi,
            "updated_at"=>Carbon::now()

        ]);

        return redirect()->route('soporte_bo')->with('editado','editadoo');

    }


        //FUNCION ASIGNAR TICKET a AUXILIAR
    public function asignarTicket(Request $r,$id){
        DB::table('tb_soportes')->insert([
            "id_jefe"=>Auth::user()->id,
            "id_aux"=>$r->txtAuxiliar,
            "id_ticket"=>$r->txtTicket,
            "observaciones"=>$r->txtObservacion,
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now()
        ]);

        DB::table('tb_tickets')->where('id_ticket',$id)->update([
            "estatus"=>"En proceso",
            "updated_at"=>Carbon::now()
        ]);
        return redirect()->route('soporte_bo')->with('share','asignado');
            // return 'asignado';
    }


    public function search(Request $request) {
        $estatus = $request->input('filtro');
        $tick = DB::table('tb_tickets')
                ->crossJoin('users')
                ->crossJoin('tb_departamentos')
                ->select('tb_tickets.id_ticket', 'users.name', 'tb_departamentos.nombre', 'tb_tickets.created_at', 'tb_tickets.clasificacion', 'tb_tickets.detalle', 'tb_tickets.estatus')
                ->where('tb_tickets.id_usu','=',DB::raw('users.id'))
                ->where('tb_tickets.id_dpto','=',DB::raw('tb_departamentos.id_dpto'))
                ->where('tb_tickets.estatus','=',$estatus)
                ->get();
        $usu = DB::table('users')
                ->crossJoin('tb_departamentos')
                ->select('users.name', 'tb_departamentos.nombre')
                ->where('users.id_dpto','=',DB::raw('tb_departamentos.id_dpto'))
                ->get();

        $depa = DB::table('tb_departamentos')->get();
        $estatus = DB::table('tb_tickets')
                ->select('estatus')
                ->groupBy('estatus')
                ->get();

        $auxs = DB::table('users')->where('perfil','=','auxiliar')->get();

        $dates = DB::table('tb_tickets')
            ->selectRaw('DATE(created_at) as Date')
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get();

         
        return view('soporte',compact('depa','tick','usu','estatus', 'auxs', 'dates'));
    }

    public function deleteUsuario(Request $r, $id)
    {
        // Obtener el usuario a borrar
        $usu = User::findOrFail($id);

        $usu->estatus = 0;
        $usu->updated_at = Carbon::now();

        $usu->save(); //Actualizar

        return redirect('soporte_bo') -> with('borrado','Envio correcto');
    }


    public function Comentar_aux(Request $r, $id)
    {
        $id = $id;

        DB::table('tb_soportes')->where('id_ticket',$id)->update([
            'detalle_aux'=>$r->Comentario,
            'updated_at'=>Carbon::now(),
        ]);
        return redirect('auxiliar_rs')->with('cambio','Envio correcto');
        return ($id);
    }

    public function search_aux(Request $r)
    {
        $id_aux = Auth::user()->id;
        $filtro = $r->search;

        if (is_null($filtro)){
            return redirect('auxiliar_rs')->with('msj','comentario');
        }else{
            
            $timestamp = strtotime($filtro); //Comprueba si filtro se puede convertir a fecha 
            
            if ($timestamp === false) {   //hace esto si filtro NO es una fecha 
            $tickets = DB::table('tb_soportes')
                ->select('tb_soportes.id_soporte', 'tb_soportes.id_aux', DB::raw("CONCAT(`users`.`name`, ' ', `users`.`apellido`) as nombre"), 'tb_tickets.detalle', 'tb_soportes.updated_at', 'users.email', 'tb_soportes.id_ticket', 'tb_departamentos.nombre as dpto', 'tb_soportes.observaciones', 'tb_soportes.detalle_aux', 'tb_tickets.clasificacion', 'tb_tickets.estatus', 'tb_tickets.created_at as fecha')
                ->join('tb_tickets','tb_soportes.id_ticket','=','tb_tickets.id_ticket')
                ->join('tb_departamentos','tb_tickets.id_dpto','=','tb_departamentos.id_dpto')
                ->join('users','tb_tickets.id_usu','=','users.id')
                ->where('tb_soportes.id_aux', '=', Auth::user()->id)
                ->where('tb_tickets.estatus','=',$filtro)
                ->get();

                if (count($tickets) == 0){

                    $tickets = DB::table('tb_soportes')
                        ->select('tb_soportes.id_soporte', 'tb_soportes.id_aux', DB::raw("CONCAT(`users`.`name`, ' ', `users`.`apellido`) as nombre"), 'tb_tickets.detalle', 'tb_soportes.updated_at', 'users.email', 'tb_soportes.id_ticket', 'tb_departamentos.nombre as dpto', 'tb_soportes.observaciones', 'tb_soportes.detalle_aux', 'tb_tickets.clasificacion', 'tb_tickets.estatus', 'tb_tickets.created_at as fecha')
                        ->join('tb_tickets','tb_soportes.id_ticket','=','tb_tickets.id_ticket')
                        ->join('tb_departamentos','tb_tickets.id_dpto','=','tb_departamentos.id_dpto')
                        ->join('users','tb_tickets.id_usu','=','users.id')
                        ->where('tb_soportes.id_aux', '=', Auth::user()->id)
                        ->where('tb_departamentos.nombre','=',$filtro)
                        ->get();
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

                    $departs = DB::table('tb_departamentos')
                        ->select('tb_departamentos.id_dpto','tb_departamentos.nombre')
                        ->join('tb_tickets','tb_departamentos.id_dpto','=','tb_tickets.id_dpto')
                        ->join('tb_soportes','tb_soportes.id_ticket','=','tb_tickets.id_ticket')
                        ->where('tb_soportes.id_aux','=',Auth::user()->id)
                        ->groupBy(DB::raw('tb_departamentos.nombre'),DB::raw('tb_departamentos.id_dpto'))
                        ->get();
            
                    return view('auxiliar',compact('estatus','dates','departs','tickets'));
                }
                else{
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

                    $departs = DB::table('tb_departamentos')
                        ->select('tb_departamentos.id_dpto','tb_departamentos.nombre')
                        ->join('tb_tickets','tb_departamentos.id_dpto','=','tb_tickets.id_dpto')
                        ->join('tb_soportes','tb_soportes.id_ticket','=','tb_tickets.id_ticket')
                        ->where('tb_soportes.id_aux','=',Auth::user()->id)
                        ->groupBy(DB::raw('tb_departamentos.nombre'),DB::raw('tb_departamentos.id_dpto'))
                        ->get();
                
                    return view('auxiliar',compact('estatus','dates','departs','tickets'));
                }
            } else{
                $tickets = DB::table('tb_soportes')
                ->select('tb_soportes.id_soporte', 'tb_soportes.id_aux', DB::raw("CONCAT(`users`.`name`, ' ', `users`.`apellido`) as nombre"), 'tb_tickets.detalle', 'tb_soportes.updated_at', 'users.email', 'tb_soportes.id_ticket', 'tb_departamentos.nombre as dpto', 'tb_soportes.observaciones', 'tb_soportes.detalle_aux', 'tb_tickets.clasificacion', 'tb_tickets.estatus', 'tb_tickets.created_at as fecha')
                ->join('tb_tickets','tb_soportes.id_ticket','=','tb_tickets.id_ticket')
                ->join('tb_departamentos','tb_tickets.id_dpto','=','tb_departamentos.id_dpto')
                ->join('users','tb_tickets.id_usu','=','users.id')
                ->where('tb_soportes.id_aux', '=', $id_aux)
                ->whereDate('tb_tickets.created_at','=',$filtro)
                ->get();

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

            $departs = DB::table('tb_departamentos')
                ->select('tb_departamentos.id_dpto','tb_departamentos.nombre')
                ->join('tb_tickets','tb_departamentos.id_dpto','=','tb_tickets.id_dpto')
                ->join('tb_soportes','tb_soportes.id_ticket','=','tb_tickets.id_ticket')
                ->where('tb_soportes.id_aux','=',Auth::user()->id)
                ->groupBy(DB::raw('tb_departamentos.nombre'),DB::raw('tb_departamentos.id_dpto'))
                ->get();
            return view('auxiliar',compact('estatus','dates','departs','tickets'));
        }}
    }

    public function cambiarEstatus(Request $r, $id)
    {
        DB::table('tb_tickets')->where('id_ticket',$id)->update([
            'estatus'=>$r->estatusTicket,
            'updated_at'=>Carbon::now(),
        ]);
        return redirect('auxiliar_rs')->with('cambio','Envio correcto');
    }
}

?>


