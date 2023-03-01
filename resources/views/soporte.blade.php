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


<!-- LOGIN  -->

    <div class="sidebar">
        <h3 class="mt-3 mb-4"><strong>Macuin<br/></strong>Dashboards</h3>
        <h4>{{ Auth::user()->name }}</h4>

        <h5 class="mt-2">Jefe de Soporte</h5>

        <h5 class="mt-2">{{ Auth::user()->email }}</h5>

        <br>
        <a href="" data-bs-toggle="modal" data-bs-target="#modalColab"><i class="bi bi-person-fill-gear"> Editar Perfil</i></a>
        <a href="" data-bs-toggle="modal" data-bs-target=""><i class="bi bi-person-fill-gear"> Registrar Departamento</i></a>
        

        {{-- <form action="{{route('logout')}}" method="POST">
            @csrf
            <a><i class="bi bi-box-arrow-left"><strong> Cerrar Sesion</strong></i></a>
        </form> 
        
        ESTO ESTA COMENTADO POR UN DETALLITO DE POST entonces puse tipo get la ruta y quedo el de abajo
        --}}

        <a href="{{route('logout')}}"><i class="bi bi-box-arrow-left"><strong> Cerrar Sesion</strong></i></a>
        
        <div class="card" style="max-width: 18rem;">
            <div class="card mb-3" style="max-width: 18rem;">
                <div class="card-header">Departamentos</div>

                    <div class="tablita overflow-auto" style="max-height: 230px; overflow-y: scroll;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Ubicacion</th>
                                </tr>
                            </thead>
                            <tbody style="max-height: 50px; overflow-y: auto;">
                                @foreach ($depa as $item)
                                <tr>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Detalle{{$item->id_dpto}}">
                                            {{$item->nombre}}
                                        </button>
                                    </td>
                                    <td>
                                        {{$item->ubicacion}}
                                    </td>
                                </tr>
                            </tbody>                                                                                                        
                            @endforeach                                                                           
                        </table>
                    </div>

            </div>
        </div>
    </div>

    @foreach ($depa as $item)
    <!-- Modal Detalle Ticket -->
    <div class="modal fade" id="Detalle{{$item->id_dpto}}" tabindex="-1" aria-labelledby="Detalle" aria-hidden="true">
        <div class="modal-dialog modal-Center">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detalles de Departamento</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            id de Departamento {{$item->id_dpto}}
            </div>
            <div class="modal-footer">
            </div>
        </div>
        </div>
    </div>
    @endforeach

    <!-- CARD DE CLIENTES  -->

    <div class="container-soporte">
        <div class="card" style="height: 19rem;">
            <div class="card-header bg-transparent mb-3"><h3>Consulta de Tickets</h3></div>
                <div class="card-body overflow-auto" style="max-height: 230px; overflow-y: scroll;">
                    <table class="table" >
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        
                        </tbody>
                    </table>
                </div>
        </div>

            <div class="card">
                <div class="card-header bg-transparent mb-3"><h4>Registrar Usuarios</h4></div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                                <form>

                                    <div class="input-group mb-4">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Nombre Usuario</span>
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                    </div>

                                    <div class="input-group mb-4">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Correo</span>
                                        <input type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                    </div>

                                    <div class="input-group mb-5">
                                        <label class="input-group-text" for="inputGroupSelect01">Departamento</label>
                                        <select class="form-select" id="inputGroupSelect01">
                                          <option selected>Selecciona una opcion...</option>
                                          <option value="1">One</option>
                                          <option value="2">Two</option>
                                          <option value="3">Three</option>
                                        </select>
                                    </div>

                                    <a href=""><button type="submit" class="btn btn-primary">Guardar Usuario</button></a>

                                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Consultar Usuarios</button>

                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="offcanvasRightLabel">Consultar Usuarios</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        
                                        <table class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Departamento</th>
                                                <th scope="col">Opciones</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>
                                                    <div class="mb-2">
                                                        <a class="btn btn-success" href="#" role="button">Editar</a>
                                                    </div>
                                                    <div>
                                                        <a class="btn btn-danger" href="#" role="button">Eliminar</a>
                                                    </div>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>

                                    </div>
                                    </div>

                                </form>
                    </blockquote>
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
                <form action="{{route('cliente_edit',Auth::user()->id)}}" method="POST">  
                    @csrf                  
                    @method('PUT')
                    </select>                    
                    <div class="row mb-3">
                        <span>Nombre</span>
                        <input type="text" name="txtNombre" class="form-control" value="{{ Auth::user()->name }}" placeholder="" required>
                    </div>
                    <div class="row mb-3">
                        <span>Apellidos</span>
                        <input type="text" name="txtApellido" class="form-control" placeholder="" value="{{ Auth::user()->apellido }}" required>
                    </div>
                    <div class="row mb-3">
                        <span>Correo</span>
                        <input type="text" name="txtEmail" class="form-control" value="{{ Auth::user()->email }}" placeholder="" required>
                    </div>
                    <div class="row mb-3">
                        <span>Perfil</span>
                        <input type="text" name="txtPerfil" class="form-control" placeholder="Pendiente" value="" disabled>
                    </div>
                    <div class="row mb-3">
                        <span>Contraseña</span>
                        <input type="password" name="txtPass" class="form-control" placeholder="Solicitar cambio" disabled>
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