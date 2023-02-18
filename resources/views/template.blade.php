<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/658c27c3ed.js" crossorigin="anonymous"></script>   
        <title>Macuin Dashboards</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/626/626610.png">
        

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <title>MacuinDashboards</title>

</head>
<body>

    <div class="contenedor-flexbox">
    <div class="container-menu">
        <div class="cont-menu">
            <nav>
                <a href=""><  Registro Comics</a>
                <a href=""> Registrar Articulos</a>
                <a href=""> Consulta Comics</a>
                <a href=""> Consulta Articulos</a>
                <a href=""> Proveedores</a>
                <a href=""> Consulta Proveedores</a>
                <a href="">Pedidos</a>
                <a href="">Ventas</a>
                <a class="fw-bold" href="/">LOG OUT</a>
            </nav>
        </div>
    </div>

    <div class="container-cliente">
        <div class="card">
            <!-- Separación de la pagina en 2  -->
            <div class="row mt-4">
        
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header bg-transparent"><h3>Solicitud de Tickets</h3></div>
                        <div class="cardbody">
        
                            <!-- Creacion del Formulario  -->
                            <div class="container">
                                <div class="card-body">
                                    <form action="">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Departamento</label>                                        
                                            <select name="txtDepartamento" class="form-select" aria-label="Default select example">
                                                <option selected>Seleccione el departamento...</option>
                                                <option value="1">Ejemplo</option>                                            
                                            </select>
                                        </div>

                                        <div class="contenedor-flexbox">
                                            <div class="mb-3">
                                                <label class="form-label">Clasificación</label>                                        
                                                <select name="txtClasificacion" class="form-select" aria-label="Default select example">
                                                    <option selected>Seleccione el problema que tiene...</option>
                                                    <option value="1">Ejemplo</option>                                            
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">¿Cual?</label>
                                                <input name="txtCual" type="email" class="form-control"  disabled>
                                            </div>                                                                                                                                    
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Descripcion:</label>
                                            <div>
                                                <textarea name="txtDescripcion" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Enviar Ticket</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="col-md-6">
                    <!--Agregar tabla  -->
                    <div class="card ">
                        <div class="card-header bg-transparent mb-3"><h3>Consulta de Tickets</h3></div>
                        <div class="cardbody">
                            <div class="container">
                                <div class="card mb-2">
                                    <div class="contenedor-flexbox">
                                        <label class="form-label mb-2 mt-2">Descripcion del ticket...</label>
                                        <button class="btn btn-primary">Cancelar Ticket</button>
                                    </div>                    
                                </div>
                                <div class="card mb-2">
                                    <div class="contenedor-flexbox">
                                        <label class="form-label mb-2 mt-2">Descripcion del ticket...</label>
                                        <button class="btn btn-primary">Cancelar Ticket</button>
                                    </div>                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
    
    @yield('codigo')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>