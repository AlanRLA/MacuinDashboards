@extends('cliente')

@section('codigo')   



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
                            <input type="text" name="txtPerfil" class="form-control" placeholder="" value="" disabled>
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


@endsection
