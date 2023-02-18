@extends('template')

@section('codigo')

    <h1>Hola mundo</h1>
    
    <div class="card-body align-self-center">
            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalColab">
              Colaboradores
            </button>
    </div>    

@section('codigo')  


    <!-- Modal de Colaboradores -->
    <div class="modal fade" id="modalColab">
        <div class="modal-dialog modal-modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Detalles de ticket</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="" method="POST">                    

                        </select>                    
                        <div class="row mb-3">
                            <span>Cliente</span>
                            <input type="text" name="txtCliente" class="form-control" placeholder="Abraham Serrato" required disabled>
                        </div>
                        <div class="row mb-3">
                            <span>Mensaje...</span>
                            <input type="text" name="txtApellido" class="form-control" placeholder="" required>
                        </div>
                        <div class="row mb-3">
                            <span>Comentarios del auxiliar...</span>
                            <textarea class="form-control" name="txtDireccion" rows="2" placeholder="" required></textarea>
                        </div>
                        <div class="row mb-3">
                            <span>Estatus</span>
                            <select class="form-select row mb-3" name="txtSector" aria-label="Default select example" required>                            
                            <option selected disabled>Sector</option>
                            </select>
                        </div>
                        

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Guardar Colaborador</button>
                        </div>
                    </form>                   
                </div>        
            </div>
          </div>
        </div>
    </div>
@endsection
