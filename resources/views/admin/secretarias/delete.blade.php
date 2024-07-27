@extends('layouts.admin')
@section('content')
   <div class="container">
      <h2>¿Deseas borrar a  {{$secretaria->user->name}}?</h2>
      <hr>

      <div class="info-create w-50 mx-auto shadow-sm p-2 rounded bg-white d-flex-wc">
          <p>
            <i class="bi bi-exclamation-circle-fill red-icon"></i> Por favor, llene los datos con cuidado.
          </p>
      </div>

      <div class="w-50 mx-auto container mt-4">
      
        <form class="bg-white shadow rounded p-3" action="{{url('/admin/secretarias/'.$secretaria->id)}}" method="post">
            @csrf
            @method('DELETE')
            <div class="mb-3">
                <label for="" class="form-label">Nombre: <b class="red">*</b></label>
                <input
                    type="text"
                    class="form-control"
                    name="nombre_secretaria"
                    id="nombre_secretaria"
                    placeholder="Nombre"
                    disabled
                    value="{{old('nombre_secretaria', $secretaria->nombre_secretaria)}}"
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
                    disabled
                    value="{{old('apellido_secretaria', $secretaria->apellido_secretaria)}}"
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
                    disabled
                    value="{{old('email', $secretaria->user->email)}}"
                />

                @error('email')
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
                    disabled
                    value="{{old('celular_secretaria', $secretaria->celular_secretaria)}}"
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
                    disabled
                    value="{{old('fecha_nacimiento_secretaria' ,$secretaria->fecha_nacimiento_secretaria)}}"
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
                    value="{{old('dni_secretaria', $secretaria->dni_secretaria)}}"
                    disabled
                />

                @error('dni_secretaria')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>

              <div class="mb-3">
                 <input class="btn btn-primary btn-block" type="submit" value="Eliminar secretaria">
              </div>
          </form>
          <div class="container mt-5">
            <a href="{{url('admin/secretarias')}}" class="btn btn-primary">Regresar</a>
          </div>
      </div>
   </div>
@endsection