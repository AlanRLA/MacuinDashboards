<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/658c27c3ed.js" crossorigin="anonymous"></script>   
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <title>Macuin Dashboards</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/626/626610.png">
        <link rel="stylesheet" href="css/estilosForms.css">
        <link rel="stylesheet" href="css/estilos.css">


</head>
<body>

    @if(session()->has('save'))
    <script type="text/javascript">          
        Swal.fire(
        '¡Todo correcto!',
        'Se ha editado su perfil',
        'success'
        )
    </script> 
    @endif

@if (session()->has('mail')) 
    <script type="text/javascript">          
        Swal.fire({
        position: 'top-center',
        icon: 'success',
        title: 'Bienvenido: {{ Auth::user()->name }}',
        showConfirmButton: false,
        timer: 1500
        })
    </script> 
@endif

@if (session()->has('hecho')) 
    <script type="text/javascript">          
        Swal.fire(
        '¡Se ha generado su ticket!',
        'Pronto tendra alguna respuesta',
        'success'
        )
    </script> 
@endif

@if(session()->has('cancelacion'))
        
    {!!" <script>Swal.fire(
      'Cancelacion exitosa!',
      '¡Se ha cancelado su ticket!',
      'success'
    )</script>"!!}
@endif

@if(session()->has('no se puede'))

<script type="text/javascript">          
    Swal.fire({
    position: 'top-center',
    icon: 'error',
    title: 'No tienes acceso',
    showConfirmButton: false,
    timer: 1700
    })
</script> 

@endif



<!-- LOGIN  -->

    <div class="sidebar overflow-auto" style="max-height: auto; overflow-y: scroll;">
        <h3 class="mt-3 mb-4"><strong>Macuin<br/></strong>Dashboards</h3>
        
                @if (Auth::user()->img_perfil == null)
                {{-- Foto default --}}
                    <img src="img/user.jpg" alt="Foto de perfil">    
                @else
                {{-- Foto editada --}}
                    <img src="{{asset('storage/'.Auth::user()->img_perfil)}}" alt="Foto de perfil">
                @endif
        

        <h4>{{ Auth::user()->name }}</h4>

        <h5 class="mt-2">Cliente</h5>
        @if (Auth::user()->perfil == null)
            <h5>Artur </h5>
        @endif

        <h5 class="mt-2">{{ Auth::user()->email }}</h5>
        <a href="" data-bs-toggle="modal" data-bs-target="#modalColab"><i class="bi bi-person-fill-gear"> Editar Perfil</i></a>
        

        {{-- <form action="{{route('logout')}}" method="POST">
            @csrf
            <a><i class="bi bi-box-arrow-left"><strong> Cerrar Sesion</strong></i></a>
        </form> 
        
        ESTO ESTA COMENTADO POR UN DETALLITO DE POST entonces puse tipo get la ruta y quedo el de abajo
        --}}

        <a href="{{route('logout')}}"><i class="bi bi-box-arrow-left"><strong> Cerrar Sesion</strong></i></a>
        
        <div class="card" style="max-width: 18rem;">
            <div class="card mb-3" style="max-width: 18rem;">
                <div class="card-header text-center">Solicitudes</div>
               
                    <div class="tablita overflow-auto" style="max-height: 230px; overflow-y: scroll;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">Problema</th>
                                    <th class="text-center" scope="col">Estatus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tickets as $item)
                                <tr>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Detalle{{$item->id_ticket}}">                                            
                                        {{$item->clasificacion}}
                                        </button>
                                    </td>
                                    <td>
                                        {{$item->estatus}}
                                    </td>
                                </tr>
                            </tbody>                                                                                                        
                            @endforeach                                                                           
                        </table>
                    </div>
                <br>
            </div>
        </div>
    </div>
<body>
        
    <!-- PROXIMAMENTE SERÁ EL TEMPLATE DE LA BARRA DE PERFIL -->

</body>

<!--Javacript-->

<script>    
    const select = document.getElementById('txtClasificacion');
    const input = document.getElementById('txtCual');

    select.addEventListener('change', function() {
        if (select.value === 'Otro:') {
            input.disabled = false;
        } else {
            input.disabled = true;
        }
    });

</script>

    @yield('codigo')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>
