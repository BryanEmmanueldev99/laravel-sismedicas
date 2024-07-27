@extends('layouts.admin')
@section('content')
   <div class="container">
      <h2>Registrar Nueva Secretaria</h2>
      <hr>

      <div class="info-create w-50 mx-auto shadow-sm p-2 rounded bg-white d-flex-wc">
          <p>
            <i class="bi bi-exclamation-circle-fill red-icon"></i> Por favor, llene los datos con cuidado.
          </p>
      </div>

      <div class="w-50 mx-auto container mt-4">
      
        <form class="bg-white shadow rounded p-3" action="{{url('/admin/secretarias/create')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Nombre: <b class="red">*</b></label>
                <input
                    type="text"
                    class="form-control"
                    name="nombre_secretaria"
                    id="nombre_secretaria"
                    placeholder="Nombre"
                    required
                    value="{{old('nombre_secretaria')}}"
                />
                
                @error('nombre_secretaria')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Apellidos: <b class="red">*</b></label>
                <input
                    type="text"
                    class="form-control"
                    name="apellido_secretaria"
                    id="apellido_secretaria"
                    placeholder="Correo electrónico"
                    required
                    value="{{old('apellido_secretaria')}}"
                />

                @error('apellidos_secretaria')
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
                <label for="" class="form-label">Celular: <b class="red">*</b></label>
                <input
                    type="text"
                    class="form-control"
                    name="celular_secretaria"
                    id="celular_secretaria"
                    placeholder="Escriba una contraseña segura"
                    required
                    value="{{old('celular_secretaria')}}"
                />

                @error('celular_secretaria')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>


              <div class="mb-3">
                <label for="" class="form-label">Fecha de nacimiento: <b class="red">*</b></label>
                <input
                    type="date"
                    class="form-control"
                    name="fecha_nacimiento_secretaria"
                    id="fecha_nacimiento_secretaria"
                    placeholder="Escriba una contraseña segura"
                    required
                    value="{{old('fecha_nacimiento_secretaria')}}"
                />

                @error('fecha_nacimiento_secretaria')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>

              <div class="mb-3">
                <label for="" class="form-label">DNI: <b class="red">*</b></label>
                <input
                    type="text"
                    class="form-control"
                    name="dni_secretaria"
                    id="dni_secretaria"
                    
                    required
                />

                @error('dni_secretaria')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>

              <div class="mb-3">
                 <input class="btn btn-primary btn-block" type="submit" value="Agregar nueva secretaria">
              </div>
          </form>
          <div class="container mt-5">
            <a href="{{url('admin/usuarios')}}" class="btn btn-primary">Regresar</a>
          </div>
      </div>
   </div>
@endsection