@extends('template')
@section('codigo')

    <h1>Hola mundo</h1>
    
    <div class="card-body align-self-center">
            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalDetail">
              Colaboradores
            </button>
    </div>    

    <!-- Modal Detalle de clientes -->
    <div class="modal fade" id="modalDetail">
        <div class="modal-dialog modal-modal-dialog-centered">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Detalles de ticket</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <form action="" method="POST">                                      
                        <div class="row mb-3">
                            <span>Cliente</span>
                            <input type="text" name="txtCliente" class="form-control" placeholder="Abraham Serrato" required disabled>
                        </div>
                        <div class="row mb-3">
                            <span>Mensaje...</span>
                            <textarea class="form-control" name="txtMensaje" rows="2" placeholder="" required></textarea>
                        </div>
                        <div class="row mb-3">
                            <span>Comentarios del auxiliar...</span>
                            <textarea class="form-control" name="txtComentario" rows="2" placeholder="" required></textarea>
                        </div>
                        <div class="row mb-3">
                            <span>Estatus</span>
                            <select class="form-select mb-3" name="txtEstatus" aria-label="Default select example" required>                            
                            <option selected disabled>...</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                                <button type="submit" class="btn btn-bd-violet">Guardar cambios</button>
                        </div>
                    </form>                   
                </div>        
            </div>
          </div>
        </div>
    </div>
@endsection
