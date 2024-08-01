@extends('layouts.admin')
@section('content')
   <div class="container">
      <h2>{{$paciente->nombre_paciente}}</h2>
      <hr>

      

      <div class="w-50 mx-auto container mt-4">
      
        <div class="container bg-white shadow rounded p-3">
            <p>Vista previa.</p>
            <hr>
            <div class="mb-3 mt-4">
                <label for="" class="form-label">Nombre:</label>
                <p>{{$paciente->nombre_paciente}}</p>
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Correo:</label>
                <p>{{$paciente->correo_paciente}}</p>
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Celular:</label>
                <p>{{$paciente->celular_paciente}}</p>
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Fecha de nacimiento:</label>
                <p>{{$paciente->fecha_nacimiento_paciente}}</p>
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Alergias:</label>
                <p>{{$paciente->alergias_paciente}}</p>
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Sexo:</label>
                <p>
                    @if ($paciente->genero_paciente == "Masculino")
                            M
                    @else
                            F
                    @endif
                </p>
              </div>
            </div>
          <div class="container mt-5">
            <a href="{{url('admin/pacientes')}}" class="btn btn-primary">Regresar</a>
          </div>
      </div>
   </div>
@endsection