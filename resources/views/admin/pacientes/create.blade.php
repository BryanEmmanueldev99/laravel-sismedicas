@extends('layouts.admin')
@section('content')
   <div class="container">
      <h2>Registrar Nuevo paciente</h2>
      <hr>

      <div class="info-create w-50 mx-auto shadow-sm p-2 rounded bg-white d-flex-wc">
          <p>
            <i class="bi bi-exclamation-circle-fill red-icon"></i> Por favor, llene los datos con cuidado.
          </p>
      </div>

      <div class="w-50 mx-auto container mt-4">
      
        <form class="bg-white shadow rounded p-3" action="{{url('/admin/pacientes/create')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Nombre: <b class="red">*</b></label>
                <input
                    type="text"
                    class="form-control"
                    name="nombre_paciente"
                    id="nombre_paciente"
                    placeholder="Nombre"
                    required
                    value="{{old('nombre_paciente')}}"
                />
                
                @error('nombre_paciente')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Apellidos: <b class="red">*</b></label>
                <input
                    type="text"
                    class="form-control"
                    name="apellidos_paciente"
                    id="apellidos_paciente"
                    required
                    value="{{old('apellidos_paciente')}}"
                />

                @error('apellidos_paciente')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Fecha de nacimiento: <b class="red">*</b></label>
                <input
                    type="date"
                    class="form-control"
                    name="fecha_nacimiento_paciente"
                    id="fecha_nacimiento_paciente"
                    required
                    value="{{old('fecha_nacimiento_paciente')}}"
                />

                @error('fecha_nacimiento_paciente')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>

              <div class="mb-3">
                <label for=""  class="form-label">Genero: <b class="red">*</b></label>
                <select class="form-control" name="genero_paciente" id="">
                    <option value="Masculino">Másculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
              </div>


              <div class="mb-3">
                <label for="" class="form-label">Celular: <b class="red">*</b></label>
                <input
                    type="number"
                    class="form-control"
                    name="celular_paciente"
                    id="celular_paciente"
                    
                    value="{{old('celular_paciente')}}"
                />

                @error('celular_paciente')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>


              <div class="mb-3">
                <label for="" class="form-label">Correo: <b class="red">*</b></label>
                <input
                    type="email"
                    class="form-control"
                    name="correo_paciente"
                    id="correo_paciente"
                    
                />

                @error('correo_paciente')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>


              <div class="mb-3">
                <label for="" class="form-label">peso: <b class="red">*</b></label>
                <input
                    type="text"
                    class="form-control"
                    name="peso_paciente"
                    id="peso_paciente"
                    
                />

                @error('peso_paciente')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>


              <div class="mb-3">
                <label for="" class="form-label">Direccion: <b class="red">*</b></label>
                <textarea class="form-control" name="dirrecion_paciente" id=""></textarea>
                
                @error('dirrecion_paciente')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Alergias: <b class="red">*</b></label>
                <textarea class="form-control" name="alergias_paciente" id=""></textarea>
                
                @error('alergias_paciente')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Observaciones: <b class="red">*</b></label>
                <textarea class="form-control" name="observaciones_paciente" id="" cols="30" rows="10"></textarea>
                
                @error('observaciones_paciente')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>


              <div class="mb-3">
                 <input class="btn btn-primary btn-block" type="submit" value="Agregar nuevo paciente">
              </div>
          </form>
          <div class="container mt-5">
            <a href="{{url('admin/pacientes')}}" class="btn btn-primary">Regresar</a>
          </div>
      </div>
   </div>
@endsection