@extends('layouts.admin')
@section('content')
   <div class="row">

      <h3>Hola {{Auth::user()->name}} |  Rol activo:  {{Auth::user()->roles->pluck('name')->first()}}</h3>

      <div class="container row">
           @can('admin.usuarios.index')
            <div class="col-lg-3 col-6">
               <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$total_usuarios}}</h3>
                  <p>Usuarios</p>
               </div>
               <div class="icon">
                <i class="ion ion-user"></i>
               </div>
                <a href="#" class="small-box-footer">Ver más<i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
           @endcan

           @can('admin.secretarias.index')
            <div class="col-lg-3 col-6">
               <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$total_secretarias}}</h3>
                  <p>Secretarias</p>
               </div>
               <div class="icon">
                <i class="ion ion-user"></i>
               </div>
                <a href="#" class="small-box-footer">Ver más<i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
           @endcan

           @can('admin.pacientes.index')
            <div class="col-lg-3 col-6">
               <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$total_pacientes}}</h3>
                  <p>Pacientes</p>
               </div>
               <div class="icon">
                <i class="ion ion-user"></i>
               </div>
                <a href="#" class="small-box-footer">Ver más<i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
           @endcan
      </div>
   </div>

   

  
@endsection