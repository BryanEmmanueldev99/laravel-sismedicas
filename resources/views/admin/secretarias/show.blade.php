@extends('layouts.admin')
@section('content')
   <div class="container">
      <h2>{{$secretaria->nombre_secretaria}}</h2>
      <hr>

      <div class="w-50 mx-auto container mt-4">
      
        <div class="container bg-white shadow rounded p-3">
            <p>Vista previa.</p>
            <hr>
            <div class="mb-3 mt-4">
                <label for="" class="form-label">Nombre:</label>
                <p>{{$secretaria->nombre_secretaria}}</p>
              </div>

              <div class="mb-3 mt-4">
                <label for="" class="form-label">Apellidos:</label>
                <p>{{$secretaria->apellido_secretaria}}</p>
              </div>

              <div class="mb-3 mt-4">
                <label for="" class="form-label">Celular:</label>
                <p>{{$secretaria->celular_secretaria}}</p>
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Correo:</label>
                <p>{{$secretaria->user->email}}</p>
              </div>
            </div>
          <div class="container mt-5">
            <a href="{{url('admin/usuarios')}}" class="btn btn-primary">Regresar</a>
          </div>
      </div>
   </div>
@endsection