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


   @if (($mensaje = Session::get('status')) && ($icon = Session::get('icono')))
               <script>
  Swal.fire({
  position: "top-end",
  icon: "{{$icon}}",
  title: "{{$mensaje}}",
  showConfirmButton: false,
  timer: 2500
});
               </script>
   @elseif(($mensaje = Session::get('hora_reserva')) && ($icon = Session::get('icono')))
   <script>
    Swal.fire({
    position:"top-end",
    icon: "{{$icon}}",
    title: "{{$mensaje}}",
    showConfirmButton: false,
    timer: 2500
  });
                 </script>
   @endif

   
   <div class="calendario mt-5">
      <div class="container">

            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
   Agendar cita
 </button>
 
 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Reserve una cita</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       
        <form action="{{route('admin.events.create')}}" method="post">
            @csrf
            <div class="modal-body">
               <div class="mb-3 form-group">
                        <label for="">Doctor</label>
                        <select class="form-control" name="doctor_id" id="">
                                 @foreach ($doctores as $doctor)
                                     <option value="{{$doctor->id}}">
                                        {{$doctor->nombre_doctor}} | {{$doctor->especialidad_doctor}}
                                     </option>
                                 @endforeach
                        </select>
               </div>
   
               <div class="mb-3 form-group">
                  <label for="">Fecha de reserva</label>
                  <input required class="form-control" type="date" name="fecha_reserva" id="fecha_reserva">
                  @error('hora_reserva')
                  <small class="red">{{$message}}</small>
                @enderror
                  <script>
                     document.addEventListener('DOMContentLoaded',function (){
                         const fechaReservaInput=document.getElementById('fecha_reserva');

                         //Escuchar el evento de cambio en el campo de fecha reserva
                         fechaReservaInput.addEventListener('change',function (){
                             let selectedDate=this.value;//Obtener la Fecha seleccionada
                             //Obtener la fecha actual en formato ISO (yyyy-mm-dd)
                             let today=new Date().toISOString().slice(0,10);
                             //Verificar si la fecha seleccionada es anterior a la fecha actual
                             if (selectedDate < today){
                                 //Si es así, establecer la fecha seleccionada en null
                                 this.value=null;
                                 //alert ('No se puede reservar en una fecha pasada.');          
            Swal.fire({
            position: "top-end",
            icon: "error",
            title: "No se puede reservar en una fecha pasada.",
            showConfirmButton: false,
            timer: 2500
          });
           
                             }
                         });
                     });
                 </script>
                 @if (($mensaje = Session::get('hora_reserva')))
                 <script>
                      document.addEventListener('DOMContentLoaded', function() {
                          $('#exampleModal').modal('show');
                      });
                 </script>
          @endif
              </div>
   
              <div class="mb-3 form-group">
                <label for="">Hora de reserva</label>
                <input required class="form-control" type="time" name="hora_reserva" id="hora_reserva">
                @error('hora_reserva')
                  <small class="red">{{$message}}</small>
                @enderror
                <script>
                  document.addEventListener('DOMContentLoaded', function (){
                      const horaReservaInput = document.getElementById('hora_reserva');
                      horaReservaInput.addEventListener('change',function (){
                          let seletedTime = this.value;
                          if(seletedTime){
                              seletedTime = seletedTime.split(':');
                              seletedTime = seletedTime[0]+ ':00';
                              this.value = seletedTime;
                          }
                          if(seletedTime<'08:00' || seletedTime>'20:00'){
                              this.value = null;
                              //alert('Porfavor ingrese un horario entre las 08:00 de la mañana y 20:00 de la tarde');
                              Swal.fire({
            position: "top-end",
            icon: "error",
            title: "Porfavor ingrese un horario entre las 08:00 de la mañana y 20:00 de la tarde.",
            showConfirmButton: false,
            timer: 2500
          });
                          };
                      });
                  });
               </script>
              </div>

            <div class="mb-3 form-group">
               <label for="">Seleccionar consultorio</label>
               <select class="form-control" name="consultorio_id" id="">
                        @foreach ($consultorios as $consultorio)
                            <option value="{{$consultorio->id}}">
                                {{$consultorio->nombre_consultorio}}
                            </option>
                        @endforeach
               </select>
            </div>

            <div class="mb-3 form-group">
               @php
                $colors = ['Azul ("Por defecto")'=>'#3788d8','Morado'=>'#9370DB','Coral'=>'#FF7F50','Verde'=>'#90EE90','Verde oscuro'=>'#8FBC8B'];
                  //$nombres_colores= ['Morado','Coral','Verde','Verde oscuro'];
               @endphp
               <label for="">Asignar color</label>
               <select class="form-control" name="color" id="">
                        @foreach ($colors as $color => $hexadecimal)
                            <option value="{{$hexadecimal}}">
                                {{$color}}
                            </option>
                        @endforeach
               </select>
            </div>

          </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
             <button type="submit" class="btn btn-primary">Confirmar</button>
           </div>
        </form>

     </div>
   </div>
 </div>

      </div>
      <div class="" id="calendar">
         <script>
            cadena = new String("");
            document.addEventListener('DOMContentLoaded', function() {
              var calendarEl = document.getElementById('calendar');
              var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'es',
                events: [
                  @foreach ($eventos as $evento)
                     {
                      //{{\Carbon\Carbon::parse($evento->start)->format('y-m-d')}}
                        title: '{{$evento->title}}',
                        start: '{{ \Carbon\Carbon::parse($evento->start)->format('y-m-d')}}',
                        end: '{{ \Carbon\Carbon::parse($evento->end)->format('y-m-d')}}',
                        color: '{{$evento->color}}'
                     },
                  @endforeach
                ]
              });
              calendar.render();
            });
          
          </script>
      </div>
   </div>

   

  
@endsection