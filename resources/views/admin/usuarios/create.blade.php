@extends('layouts.admin')
@section('content')
   <div class="container">
      <h2>Registrar Nuevo Usuario</h2>
      <hr>

      <div class="info-create w-50 mx-auto shadow-sm p-2 rounded bg-white d-flex-wc">
          <p>
            <i class="bi bi-exclamation-circle-fill red-icon"></i> Por favor, llene los datos con cuidado.
          </p>
      </div>

      <div class="w-50 mx-auto container mt-4">
      
        <form class="bg-white shadow rounded p-3" action="{{url('/admin/usuarios/create')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Nombre: <b class="red">*</b></label>
                <input
                    type="text"
                    class="form-control"
                    name="name"
                    id="name"
                    placeholder="Nombre"
                    required
                    value="{{old('name')}}"
                />
                
                @error('name')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Correo: <b class="red">*</b></label>
                <input
                    type="email"
                    class="form-control"
                    name="email"
                    id="email"
                    placeholder="Correo electrónico"
                    required
                    value="{{old('email')}}"
                />

                @error('email')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Contraseña: <b class="red">*</b></label>
                <input
                    type="password"
                    class="form-control"
                    name="password"
                    id="password"
                    placeholder="Escriba una contraseña segura"
                    required
                    value="{{old('password')}}"
                />

                @error('password')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Confirmar contraseña: <b class="red">*</b></label>
                <input
                    type="password"
                    class="form-control"
                    name="password_confirmation"
                    id="password_confirmation"
                    placeholder="Confirme su contraseña"
                    required
                />

                @error('password')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>

              <div class="mb-3">
                 <input class="btn btn-primary btn-block" type="submit" value="Agregar nuevo usuario">
              </div>
          </form>
          <div class="container mt-5">
            <a href="{{url('admin/usuarios')}}" class="btn btn-primary">Regresar</a>
          </div>
      </div>
   </div>
@endsection