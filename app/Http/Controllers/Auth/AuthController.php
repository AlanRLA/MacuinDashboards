<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function registrar()
    {
        return view('registrarUsuario');
    }

    public function registrar_v(Request $r)  
    {
        $r->validate([
            'txtusu' =>'required|string',
            'txtemail' =>'required|unique:users,email',
            'txtpass'=>'required|min:4',
            'txtpass_v' => 'required|same:txtpass'
        ]);

        User::create([
            'name' => $r->txtusu,
            'email' => $r->txtemail,
            'password' => bcrypt($r->txtpass),
        ]);

    return redirect()->route('login')->with('success', 'Registrado');
    }

    public function login()
    {
        return view('login');
    }

}
