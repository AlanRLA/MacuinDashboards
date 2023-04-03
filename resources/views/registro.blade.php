@extends('fondo')
@section('contenido')
<div class="form">
<div class="container mt-4 col-md-4" style="background-color: aliceblue; border: 2px solid #9eadba">
    <div class="row align-items-stretch">
        <h2>Macuin <br/> Dashboards</h2>     
        
        <div class="container col-md-10 mt-5 mb-5" style="background-color: #e0defd; border: 1px solid #6558f5">

        <form action="">
        @csrf
            <div class="inputB">
                <input type="text" name="txtusu" required="required">
                <span>Nombre de Usuario</span>
                <i></i>
            </div>

            <div class="inputB">
                <input type="text" name="txtpass" required="required">
                <span>Contraseña</span>
                <i></i>
            </div>

            <div class="inputB">
                <input type="text" name="txtpass" required="required">
                <span>Confirmar Contraseña</span>
                <i></i>
            </div>

            <button type="submit" class="btn btn-success mb-3 mt-4 form-control">Registrar</button>     
         
            <button type="submit" class="btn btn-primary mb-3 mt-4 form-control">Volver al Inicio</button>     
        </form> 
        </div>
    </div>
</div>
</div>
@endsection
