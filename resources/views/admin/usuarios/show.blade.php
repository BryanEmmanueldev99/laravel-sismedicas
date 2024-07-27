@extends('layouts.admin')
@section('content')
   <div class="container">
      <h2>{{$usuario->name}}</h2>
      <hr>

      

      <div class="w-50 mx-auto container mt-4">
      
        <div class="container bg-white shadow rounded p-3">
            <p>Vista previa.</p>
            <hr>
            <div class="mb-3 mt-4">
                <label for="" class="form-label">Nombre:</label>
                <p>{{$usuario->name}}</p>
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Correo:</label>
                <p>{{$usuario->email}}</p>
              </div>
            </div>
          <div class="container mt-5">
            <a href="{{url('admin/usuarios')}}" class="btn btn-primary">Regresar</a>
          </div>
      </div>
   </div>
@endsection