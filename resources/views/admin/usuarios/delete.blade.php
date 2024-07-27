@extends('layouts.admin')
@section('content')
   <div class="container">
      <h2>{{$usuario->name}}</h2>
      <hr>

      <div class="info-create w-50 mx-auto shadow-sm p-2 rounded bg-white d-flex-wc">
          <p>
            <i class="bi bi-exclamation-circle-fill red-icon"></i>¿Estás seguro de borrar este usuario?
          </p>
      </div>

      <div class="w-50 mx-auto container mt-4">
      
        <form class="bg-white shadow rounded p-3" action="{{url('/admin/usuarios/'.$usuario->id)}}" method="post">
            @csrf
            @method('DELETE')
            <div class="mb-3">
                <label for="" class="form-label">Nombre: <b class="red">*</b></label>
                <input
                    type="text"
                    class="form-control"
                    name="name"
                    id="name"
                    placeholder="Nombre"
                    disabled
                    value="{{old('name', $usuario->name)}}"
                />
                
                @error('name')
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
                    value="{{old('email', $usuario->email)}}"
                />

                @error('email')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>

              
              <div class="mb-3">
                 <input class="btn btn-primary btn-block" type="submit" value="Confirmar">
              </div>
          </form>
          <div class="container mt-5">
            <a href="{{url('admin/usuarios')}}" class="btn btn-default">Regresar</a>
          </div>
      </div>
   </div>
@endsection