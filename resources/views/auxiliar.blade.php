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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-c5A5/D5ue/0Gsz7VpC5jBZ7VgNf9zpH2IeP6oY5Y13r5y5I1H7dGjKgBb7X9exDtf+FfjFucdBzR20R7Gp6yjKQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/626/626610.png">       
        <link rel="stylesheet" href="css/estilosForms.css">
        <link rel="stylesheet" href="css/estilos.css">


</head>
<body>

    @if(session()->has('save2'))
    <script type="text/javascript">          
        Swal.fire(
        '¡Todo correcto!',
        'Se ha editado su perfil',
        'success'
        )
    </script> 
    @endif

    @if (session()->has('successUsuario')) 
        <script type="text/javascript">          
            Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Usuario creado en la BD',
            showConfirmButton: false,
            timer: 1500
            })
        </script> 
    @endif

    @if (session()->has('regis')) 
        <script type="text/javascript">          
            Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Departamento creado en la BD',
            showConfirmButton: false,
            timer: 1500
            })
        </script> 
    @endif

    @if (session()->has('editado')) 
        <script type="text/javascript">          
            Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Departamento editado',
            showConfirmButton: false,
            timer: 1500
            })
        </script> 
    @endif

<!-- LOGIN  -->

    <div class="sidebar">
        <h3 class="mt-3 mb-4"><strong>Macuin<br/></strong>Dashboards</h3>
        <h4>{{ Auth::user()->name }}</h4>

        <h5 class="mt-2"><strong>Perfil:</strong> {{ Auth::user()->perfil }}</h5>

        <h5 class="mt-2">{{ Auth::user()->email }}</h5>

        <br>
        <a href="" data-bs-toggle="modal" data-bs-target="#modalColab"><i class="bi bi-person-fill-gear"> Editar Perfil</i></a>
        <a href="" data-bs-toggle="modal" data-bs-target="#m_menu"><i class="bi bi-file-earmark-pdf-fill"> Generar reporte</i></a>
        

        {{-- <form action="{{route('logout')}}" method="POST">
            @csrf
            <a><i class="bi bi-box-arrow-left"><strong> Cerrar Sesion</strong></i></a>
        </form> 
        
        ESTO ESTA COMENTADO POR UN DETALLITO DE POST entonces puse tipo get la ruta y quedo el de abajo
        --}}

        <a href="{{route('logout')}}"><i class="bi bi-box-arrow-left"><strong> Cerrar Sesion</strong></i></a>

        <div class="card" style="">
            <div class="card mb-3" style="max-width: 18rem;">
                <div class="card-header">Historial de tickets asignados</div>
               
                    <div class="tablita overflow-auto" style="max-height: 230px; overflow-y: scroll;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Problema</th>
                                    <th scope="col">Estatus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                </tr>
                            </tbody>                                                                                                                                                                                 
                        </table>
                    </div>
                
            </div>
        </div>
    </div>


    <div class="container-auxiliar">
        <div class="card" style="height: 38rem;">
            <div class="card-header bg-transparent mb-1"><h3>Control de Tickets</h3></div>
            <div class="card-body overflow-auto" style="max-height: 100%; overflow-y: scroll;">
                <div class="container">
                    <div class="contenedor-flexbox">
                        <form action="" method="get" id="search-form">
                            @csrf
                            <select class="form-select" aria-label="Default select example" name="filtro" id="search-form">  
                                <option disabled selected>Estatus ...</option>                                                                   
                            </select>                            
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </form>    
                    </div>  
                    
                    @foreach ($tickets as $ticket)
                        <div class="card ">
                            <div class="card-header bg-transparent mb-2 text-center"><h5>Departamento: {{$ticket->dpto}}</h5></div>
                            <div class="cardbody">                                                                                   
                                <h6>Descripcion ticket: {{$ticket->clasificacion}}</h6>
                                <h6>Estatus: {{$ticket->estatus}}</h6>
                                <h6>Fecha: {{$ticket->fecha}}</h6>
                                <h6>Opciones: <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Detalle{{$ticket->id_ticket}}">más detalles</button> <button class="btn btn-info">estatus</button> <button class="btn btn-warning">comentar</button> </h6>   
                               </div>
                                <!-- Modal Detalle Ticket -->
<div class="modal fade" id="Detalle{{$ticket->id_ticket}}" tabindex="-1" aria-labelledby="Detalle" aria-hidden="true">
    <div class="modal-dialog modal-modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalles de Ticket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label>{{$ticket->id_ticket}}</label>
                <div>
                    <span>Cliente</span><br>
                    <input type="text" class="form-control" value="{{$ticket->nombre}}" disabled>    
                </div>
                <div>
                    <span>Correo cliente</span><br>
                    <input type="text" class="form-control" value="{{$ticket->email}}" disabled>    
                </div>
                <div>
                    <span>Detalle</span><br>
                    <input type="text" class="form-control" value="{{$ticket->detalle}}" disabled>
                </div>
                <div>
                    <span>Ultima modificación</span><br>
                    <input type="text" class="form-control" value="{{$ticket->updated_at}}" disabled>
                </div>
                <div>
                    <span>Comentarios del jefe</span>
                    <textarea cols="30" rows="3" class="form-control" disabled>{{$ticket->observaciones}}</textarea>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <br>
    </div>




    <!-- Modal de Colaboradores -->
    <div class="modal fade" id="modalColab">
        <div class="modal-dialog modal-modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Datos de usuario</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="{{route('soporte_edit',Auth::user()->id)}}" method="POST">  
                        @csrf                  
                        @method('PUT')
                        </select>                    
                        <div class="row mb-3">
                            <span>Nombre</span>
                            <input type="text" name="txtnombre" class="form-control" value="{{ Auth::user()->name }}" placeholder="" required>
                        </div>
                        <div class="row mb-3">
                            <span>Apellidos</span>
                            <input type="text" name="txtapellido" class="form-control" placeholder="" value="{{ Auth::user()->apellido }}" required>
                        </div>
                        <div class="row mb-3">
                            <span>Correo</span>
                            <input type="text" name="txtemail" class="form-control" value="{{ Auth::user()->email }}" placeholder="" required>
                        </div>
                        <div class="row mb-3">
                            <span>Perfil</span>
                            <input type="text" name="txtperfil" class="form-control" value="{{ Auth::user()->perfil }}" disabled>
                        </div>
                        <div class="row mb-3">
                            <span>Contraseña</span>
                            <input type="password" name="txtppass" class="form-control" placeholder="pendiente">
                        </div>
                        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Editar Datos</button>
                        </div>
                    </form>                   
                </div>        
            </div>
        </div>
        </div>
    </div>
    <div class="modal fade" id="m_menu" aria-hidden="true" aria-labelledby="m_menu" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="m_menu">Menú de elección de reporte</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- CARDS --}}
                <div class="card-group">
                    {{-- CLASIFICACIÓN --}}
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title text-center">Departamentos</h5>
                        </div>
                        <div class="card-body">
                            <img src="img/h.png" class="card-img-top" alt="..." style="pointer-events:none;" >
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary form-control" data-bs-target="#m_clasificacion" data-bs-toggle="modal" data-bs-dismiss="modal">Generar</button>
                        </div>
                    </div>
                    {{-- ESTATUS --}}
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title text-center">Estatus</h5>
                        </div>
                        <div class="card-body">
                            <img src="img/s.png" class="card-img-top" alt="..." style="pointer-events:none;" >
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary form-control" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Generar</button>
                        </div>
                    </div>
                    {{-- fECHA --}}
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title text-center">Fecha</h5>
                        </div>
                        <div class="card-body">
                            <img src="img/c.png" class="card-img-top" alt="..." style="pointer-events:none;" >
                            <p class="card-text"><small class="text-muted">Last update 3 mins ago</small></p>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary form-control" data-bs-target="#m_fechas" data-bs-toggle="modal" data-bs-dismiss="modal">Generar</button>
                        </div>
                    </div>
                  </div>
                </div>
                {{-- FIN CARDS --}}
            <div class="modal-footer text-center">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Reporte General</button>
            </div>
          </div>
        </div>
      </div>
      {{-- segundos modals --}}
      <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalToggleLabel2">Modal 2</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Hide this modal and show the first with the button below.
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Back to first</button>
            </div>
          </div>
        </div>
      </div>
    
      {{-- Modal Reporte Fechas --}}
      <div class="modal fade" id="m_fechas" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalToggleLabel2">Fechas</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('reporte_date')}}" method="post">
                    @csrf
                    <div>
                        <select name="fechas" class="form-select"  id="fechas" aria-label="Default select example">
                            <option value="" selected disabled>Seleccione la fecha a reportar...</option>
                            @foreach ($dates as $date)
                                <option value="{{$date->Date}}">{{$date->Date}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary"> <i class="bi bi-download"></i> Descargar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" data-bs-target="#m_menu" data-bs-toggle="modal" data-bs-dismiss="modal">Regresar</button>
            </div>
          </div>
        </div>
      </div>
       {{-- <!-- Modal Detalle Ticket -->
    @foreach ($tickets as $ticketM)
    <div class="modal fade" id="Detalle{{$ticketM->id_ticket}}" tabindex="-1" aria-labelledby="Detalle" aria-hidden="true">
        <div class="modal-dialog modal-modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detalles de Ticket</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label>{{$ticketM->id_ticket}}</label>
                <div>
                    <span>Cliente</span><br>
                    <input type="text" class="form-control" value="" disabled>    
                </div>
                <div>
                    <span>Correo cliente</span><br>
                    <input type="text" class="form-control" value="" disabled>    
                </div>
                <div>
                    <span>Detalle</span><br>
                    <input type="text" class="form-control" value="" disabled>
                </div>
                <div>
                    <span>Ultima modificación</span><br>
                    <input type="text" class="form-control" value="" disabled>
                </div>
                <div>
                    <span>Comentarios del jefe</span>
                    <textarea cols="30" rows="3" class="form-control" disabled>...</textarea>
                </div>
                <div>
            </div>
            
            </div>
            <div class="modal-footer">
            </div>
        </div>
        </div>
    </div>
    @endforeach --}}
<!--Javacript-->

    @yield('codigo')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-3M4QbEx9tI8KFtZrH3q3J2LgBV+JG8WxxKpFsfR1JnXpsof8+fV+ReL+zJezGbc7MvTUL+ak2cJ1bGYaYV7uXw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>