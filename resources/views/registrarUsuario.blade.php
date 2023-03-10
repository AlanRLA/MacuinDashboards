@extends('fondo')
@section('contenido')

<div class="form">
<div class="container mt-4 col-md-4" style="background-color: aliceblue; border: 2px solid #9eadba">
    <div class="row align-items-stretch">
            <h2>Registrar <br/> Usuario</h2>          
        <div class="container col-md-10 mt-5 mb-3" style="background-color: #e0defd; border: 1px solid #6558f5">

        <form action="" method="POST">
        @csrf
            <div class="inputB">
                <input type="text" name="txtusu" required="required" value="{{old('txtusu')}}">
                <span>Nombre</span>
                <i></i>
            </div>
            @error('txtusu')
                 <small class="txt-danger mt-1"> <strong>{{$message}}</strong> </small>
            @enderror
{{-- Pausada su funcionalidad
            <div class="inputB">
                <input type="text" name="txtape" required="required">

        <form action="/sesion" method="post">
        @csrf
            <div class="inputB">
                <input type="text" name="txtApe" required="required">

                <span>Apellidos</span>
                <i></i>
            </div>
--}}
            <div class="inputB">
                <input type="text" name="txtemail" required="required">
                <span>Correo</span>
                <i></i>
            </div>
            @error('txtemail')
                 <small class="txt-danger mt-1"> <strong>{{$message}}</strong> </small>
            @enderror

            <div class="inputB">
                <input type="password" name="txtpass" required="required">
                <span>Contraseña</span>
                <i></i>
            </div>
            @error('txtpass')
                 <small class="txt-danger mt-1"> <strong>{{$message}}</strong> </small>
            @enderror

            <div class="inputB">
                <input type="password" name="txtpass_v" required="required">
                <span>Confirma contraseña</span>
                <i></i>
            </div>
            @error('txtpass_v')
                 <small class="txt-danger mt-1"> <strong>{{$message}}</strong> </small>
            @enderror

{{--        Select de perfil (el perfil cliente se puede asignar a todos, el jefe asigna rol) 
            <div class="inputB">
                <select class="form-select" aria-label="Default select example" required> 
                    <option selected>Selecciona un perfil...</option>
                    <option value="1">Cliente</option>
                  </select>
            </div>
--}}
            <button type="submit" class="btn btn-success mb-3 mt-4 form-control">Registrar</button>     
        </form> 
           <p class="text-left"><a class="text-left" href="/"><button type="button" class="btn"><strong><i class="bi bi-arrow-left-square-fill"> Login</i></strong></button></a></p> 

        </div>
    </div>
</div>
</div>

@endsection
