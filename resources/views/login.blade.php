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
        
</head>
</head>
<body style="background-color: #d5e7f7">
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
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


</body>
</html>