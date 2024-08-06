@extends('layouts.admin')
@section('content')
   <div class="container">
      <h2>Borrar {{$consultorio->nombre_consultorio}}</h2>
      <hr>

      <div class="info-create w-50 mx-auto shadow-sm p-2 rounded bg-white d-flex-wc">
          <p>
            <i class="bi bi-exclamation-circle-fill red-icon"></i> Por favor, llene los datos con cuidado.
          </p>
      </div>

      <div class="w-50 mx-auto container mt-4">
      
        <form class="bg-white shadow rounded p-3" action="{{url('/admin/consultorios/'.$consultorio->id)}}" method="post">
            @csrf
            @method('DELETE')
            
               <p>
                {{$consultorio->nombre_consultorio}}
               </p>

              <div class="mb-3">
                 <input class="btn btn-primary btn-block" type="submit" value="Borrar paciente">
              </div>
          </form>
          <div class="container mt-5">
            <a href="{{url('admin/consultorios')}}" class="btn btn-primary">Regresar</a>
          </div>
      </div>
   </div>
@endsection