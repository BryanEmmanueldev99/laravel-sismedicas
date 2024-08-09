@extends('layouts.admin')
@section('content')
   <div class="container">
      <h2>Actualizar consultorio</h2>
      <hr>

      <div class="info-create w-50 mx-auto shadow-sm p-2 rounded bg-white d-flex-wc">
          <p>
            <i class="bi bi-exclamation-circle-fill red-icon"></i> Por favor, llene los datos con cuidado.
          </p>
      </div>

      <div class="w-50 mx-auto container mt-4">
      
        <form class="bg-white shadow rounded p-3" action="{{url('/admin/consultorios/'. $consultorio->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="" class="form-label">Nombre: <b class="red">*</b></label>
                <input
                    type="text"
                    class="form-control"
                    name="nombre_consultorio"
                    placeholder="Nombre"
                    required
                    value="{{old('nombre_consultorio', $consultorio->nombre_consultorio)}}"
                />
                
                @error('nombre_consultorio')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>

              <div class="mb-3">
                <label for="" class="form-label">ubicacion_consultorio: <b class="red">*</b></label>
                <input
                    type="text"
                    class="form-control"
                    name="ubicacion_consultorio"
                    id="ubicacion_consultorio"
                    required
                    value="{{old('ubicacion_consultorio', $consultorio->ubicacion_consultorio)}}"
                />

                @error('ubicacion_consultorio')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Capacidad: <b class="red">*</b></label>
                <input
                    type="text"
                    class="form-control"
                    name="capacidad_consultorio"
                    id="capacidad_consultorio"
                    required
                    value="{{old('capacidad_consultorio', $consultorio->capacidad_consultorio)}}"
                />

                @error('capacidad_consultorio')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>

             


              <div class="mb-3">
                <label for="" class="form-label">Telefono: <b class="red">*</b></label>
                <input
                    type="number"
                    class="form-control"
                    name="telefono_consultorio"
                    id="telefono_consultorio"
                    
                    value="{{old('telefono_consultorio', $consultorio->telefono_consultorio)}}"
                />

                @error('telefono_consultorio')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>


              <div class="mb-3">
                <label for="" class="form-label">Especialidad: <b class="red">*</b></label>
                <input
                    type="text"
                    class="form-control"
                    name="especialidad_consultorio"
                    id="especialidad_consultorio"
                    value="{{$consultorio->especialidad_consultorio}}"
                />

                @error('especialidad_consultorio')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>


              <div class="mb-3">
                <label for="" class="form-label">Estado: <b class="red">*</b></label>
                <select name="estado_consultorio" class="form-control" class="form-control" id="">

                    @if ($consultorio->estado_consultorio == "Activo")
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                    @else
                    <option value="Inactivo">Inactivo</option>
                    <option value="Activo">Activo</option>
                    @endif
        
                </select>

                @error('estado_consultorio')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>


              <div class="mb-3">
                 <input class="btn btn-primary btn-block" type="submit" value="Actualizar consultorio">
              </div>
          </form>
          <div class="container mt-5">
            <a href="{{url('admin/consultorios')}}" class="btn btn-primary">Regresar</a>
          </div>
      </div>
   </div>
@endsection