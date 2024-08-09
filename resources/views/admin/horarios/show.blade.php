@extends('layouts.admin')
@section('content')
   <div class="container">
      <h2>{{$consultorio->nombre_consultorio}}</h2>
      <hr>

      

      <div class="w-50 mx-auto container mt-4">
      
        <div class="container bg-white shadow rounded p-3">
            <p>Vista previa.</p>
            <hr>
            <div class="mb-3 mt-4">
                <label for="" class="form-label">Nombre:</label>
                <p>{{$consultorio->capacidad_consultorio}}</p>
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Ubicacion:</label>
                <p>{{$consultorio->ubicacion_consultorio}}</p>
              </div>

              <p>Status <b>{{$consultorio->estado_consultorio}}</b></p>

              
            </div>
          <div class="container mt-5">
            <a href="{{url('admin/consultorios')}}" class="btn btn-primary">Regresar</a>
          </div>
      </div>
   </div>
@endsection