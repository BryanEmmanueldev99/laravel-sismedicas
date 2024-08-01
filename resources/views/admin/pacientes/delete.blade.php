@extends('layouts.admin')
@section('content')
   <div class="container">
      <h2>Borrar a {{$paciente->nombre_paciente}}</h2>
      <hr>

      <div class="info-create w-50 mx-auto shadow-sm p-2 rounded bg-white d-flex-wc">
          <p>
            <i class="bi bi-exclamation-circle-fill red-icon"></i> Por favor, llene los datos con cuidado.
          </p>
      </div>

      <div class="w-50 mx-auto container mt-4">
      
        <form class="bg-white shadow rounded p-3" action="{{url('/admin/pacientes/'.$paciente->id)}}" method="post">
            @csrf
            @method('DELETE')
            <div class="mb-3">
                <label for="" class="form-label">Nombre: <b class="red">*</b></label>
                <input
                    type="text"
                    class="form-control"
                    name="nombre_paciente"
                    id="nombre_paciente"
                    placeholder="Nombre"
                    required
                    value="{{old('nombre_paciente', $paciente->nombre_paciente)}}"
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
                    disabled
                    required
                    value="{{old('apellidos_paciente', $paciente->apellidos_paciente)}}"
                />

                @error('apellidos_paciente')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>


              <div class="mb-3">
                <label for=""  class="form-label">Genero: <b class="red">*</b></label>
                <select class="form-control" name="genero_paciente" id="">
                    @if ($paciente->genero_paciente == "Masculino")
                     <option value="Masculino">Másculino</option>
                     <option value="Femenino">Femenino</option>
                    @else
                     <option value="Femenino">Femenino</option>
                     <option value="Masculino">Másculino</option>
                    @endif
                </select>
              </div>


              <div class="mb-3">
                <label for="" class="form-label">Celular: <b class="red">*</b></label>
                <input
                    type="text"
                    class="form-control"
                    name="celular_paciente"
                    id="celular_paciente"
                    
                    value="{{old('celular_paciente', $paciente->celular_paciente)}}"
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
                    value="{{$paciente->correo_paciente}}"
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
                    disabled
                    value="{{$paciente->peso_paciente}}"
                />

                @error('peso_paciente')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>


              <div class="mb-3">
                <label for="" class="form-label">Direccion: <b class="red">*</b></label>
                <textarea class="form-control" name="dirrecion_paciente" id="">{{$paciente->dirrecion_paciente}}</textarea>
                
                @error('dirrecion_paciente')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Alergias: <b class="red">*</b></label>
                <textarea class="form-control" name="alergias_paciente" id="">{{$paciente->alergias_paciente}}</textarea>
                
                @error('alergias_paciente')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Observaciones: <b class="red">*</b></label>
                <textarea class="form-control" name="observaciones_paciente" id="" cols="30" rows="10">{{$paciente->observaciones_paciente}}</textarea>
                
                @error('observaciones_paciente')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>


              <div class="mb-3">
                 <input class="btn btn-primary btn-block" type="submit" value="Borrar paciente">
              </div>
          </form>
          <div class="container mt-5">
            <a href="{{url('admin/pacientes')}}" class="btn btn-primary">Regresar</a>
          </div>
      </div>
   </div>
@endsection