@extends('fondo')

@section('contenido')



<div class="container mt-4 col-md-4" style="background-color: aliceblue; border: 2px solid #9eadba">
    <div class="row align-items-stretch">
        <h1 class="text-center mt-4">Macuin Dashboards</h1>
        <div class="container col-md-10 mt-5 mb-5" style="background-color: #e0defd; border: 1px solid #6558f5">
        <form action="">
        @csrf
            <div class="col-md-12 mb-2">
                <label class="bmd-label-floating" style="font-size: 20px">Usuario</label>
                <input type="text" class="form-control" value="" name="txtusu">
            </div>

            <div class="col-md-12 mb-2 mt-2">
                <label class="bmd-label-floating" style="font-size: 20px">Contraseña</label>
                <input type="password" class="form-control" value="" name="txtpass">
            </div>

            <button type="submit" class="btn btn-primary mb-2 mt-2 form-control">Ingresar</button>     
        </form> 
           <p class="text-center"><a href="">Registrarse</a></p>
        </div>   
    </div>
</div>



@endsection