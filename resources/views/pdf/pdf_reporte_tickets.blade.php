<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte</title>
</head>
<body>
    <H1>Macuins Dashboards</H1>
    <H2>Reporte de tickets</H2>


    <div>
        <div>
            <label><strong>Generado por: {{$usu->name}} {{$usu->apellido}}</strong></label>
            <br>
            <label><strong>Tickets: </strong></label>  
            <p>_______________________________________________</p>
        </div>
        <div>
            @foreach ($tickets as $item)
                <div>
                    <label>Nombre: {{$item->name}} {{$item->apellido}}</label> 
                    <br>
                    <label>Clasificación: {{$item->clasificacion}}</label> 
                    <br>
                    <label>Detalle: {{$item->detalle}}</label>
                    <br>
                    <label>Estatus: {{$item->estatus}}</label>
                    <br>
                    <label>Fecha registro: {{$item->created_at}}</label>
                    <br>
                    @if ($item->estatus == 'Cancelado')
                        <label>Fecha cancelación: {{$item->updated_at}}</label>
                        <br>  
                    @endif
                </div> 
            <p>_______________________________________________</p>
            @endforeach    
        </div>
       
        {{-- <div>
            <label> <strong> ...: </strong></label>
            <br>
               <label>...: </label>
            <p>_______________________________________________</p>
        </div> --}}
    </div>
    
</body>
</html>