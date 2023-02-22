@extends('fondo')
@section('contenido')

<div class="form">
<div class="container mt-4 col-md-4" style="background-color: aliceblue; border: 2px solid #9eadba">
    <div class="row align-items-stretch">
        <h2>Registrar <br/> Usuario</h2>     
        
        <div class="container col-md-10 mt-5 mb-5" style="background-color: #e0defd; border: 1px solid #6558f5">

        <form action="/sesion" method="post">
        @csrf
            <div class="inputB">
                <input type="text" name="txtApe" required="required">
                <span>Apellidos</span>
                <i></i>
            </div>

            <div class="inputB">
                <input type="text" name="txtNom" required="required">
                <span>Nombre</span>
                <i></i>
            </div>

            <div class="inputB">

                <input type="password" name="txtPas" required="required">
                <span>Contraseña</span>
                <i></i>
            </div>

            <button type="submit" class="btn btn-success mb-3 mt-4 form-control">Registrar</button>     
        </form> 

            <p class="text-left"><a class="text-left" href="/"><button type="button" class="btn"><strong><i class="bi bi-arrow-left-square-fill"> Login</i></strong></button></a></p> 

        </div>
    </div>
</div>
</div>

@endsection
