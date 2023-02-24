@extends('fondo')
@section('contenido')

@if (session()->has('hecho')) 
        <script type="text/javascript">          
            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Usuario creado :D',
            showConfirmButton: false,
            timer: 1500
            })
        </script> 
@endif

<div class="form">
<div class="container mt-4 col-md-4" style="background-color: aliceblue; border: 2px solid #9eadba">
    <div class="row align-items-stretch">
        <h2>Macuin <br/> Dashboards</h2>   
        
        @if(session()->has('success'))
           <span>Registrado</span>
        @endif

        @error('invalid_credentials')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <small>{{$message}}</small>
                    <button type="button" class="close" data-dimiss="alert" aria-label="close">
                        <span aria-hidden="true"></span>
                    </button>
            </div>  
        @enderror
        
        <div class="container col-md-10 mt-5 mb-5" style="background-color: #e0defd; border: 1px solid #6558f5">

        <form action="{{route('login.v')}}" method="POST">
        @csrf
            <div class="inputB">
                <input type="text" name="txtemail" required="required">
                <span>Correo</span>
                <i></i>
            </div>

            <div class="inputB">
                <input type="password" name="txtpass" required="required">
                <span>Contraseña</span>
                <i></i>
            </div>

            <button type="submit" class="btn btn-primary mb-3 mt-4 form-control">Ingresar</button>     
        </form> 
           <p class="text-center"><a href="registro">Registrarse</a></p>
        </div>
    </div>
</div>
</div>
@endsection
