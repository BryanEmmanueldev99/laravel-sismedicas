@extends('layouts.admin')
@section('content')
   <div class="container">
      <h2>%{{$horario->consultorio->nombre_consultorio}}%</h2>
      <hr>

      

      <div class="w-50 mx-auto container mt-4">
      
        <div class="container bg-white shadow rounded p-3">
            <p>Vista previa.</p>
            <hr>
            <div class="mb-3 mt-4">
                <label for="" class="form-label">Inicio:</label>
                <p>{{$horario->hora_inicio_horario}}</p>
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Fin:</label>
                <p>{{$horario->hora_fin_horario}}</p>
              </div>

              <p>Medico <b>{{$horario->doctor->nombre_doctor}}</b></p>

              
            </div>
          <div class="container mt-5">
            <a href="{{url('admin/horarios')}}" class="btn btn-primary">Regresar</a>
          </div>
      </div>
   </div>
@endsection