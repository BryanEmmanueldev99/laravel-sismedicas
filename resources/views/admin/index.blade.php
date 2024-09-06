@extends('layouts.admin')
@section('content')
   <div class="row">

      <h1>Adminstrador</h1>

      <div class="container row">
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
      </div>

      <span>Total secretarias:  {{$total_secretarias}}</span>
      <br><span>Total pacientes:  {{$total_pacientes}}</span>
   </div>

   

  
@endsection