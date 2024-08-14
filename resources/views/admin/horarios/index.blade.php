@extends('layouts.admin')
@section('content')
   <div class="row">
      <h1>Horarios</h1>

      <div class="mt-3 container">
           <a href="{{url('admin/horarios/create')}}" class="btn btn-primary">Agregar horario</a>
          <div
            class="table-responsive mt-3"
          >

          @if (($mensaje = Session::get('status')) && ($icon = Session::get('icono')))
               <script>
  Swal.fire({
  position: "center",
  icon: "{{$icon}}",
  title: "{{$mensaje}}",
  showConfirmButton: false,
  timer: 2500
});
               </script>
          @endif
            <table
               class="table table-bordered table-striped dataTable dtr-inline shadow-sm rounded bg-white"
               id="example1"
            >
               <thead>
                  <tr>
                     <th scope="col">Nro</th>
                     <th scope="col">Día</th>
                     <th scope="col">Hora inicio</th>
                     <th>Hora fin</th>
                     <th>Doctor</th>
                     <th>Consultorio</th>
                     <th scope="col">Acciones</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $contador_id = 1;  ?>
                  @foreach ($horarios as $horario)
                   <tr class="">
                     <td style="text-align: center" scope="row">{{$contador_id++}}</td style="text-align: center">
                     <td style="text-align: center">{{$horario->dia_horario}}</td>
                     <td style="text-align: center">{{$horario->hora_inicio_horario}}</td>
                     <td style="text-align: center">{{$horario->hora_fin_horario}}</td>
                     <td style="text-align: center">{{$horario->doctor->nombre_doctor}}</td>
                     <td style="text-align: center">{{$horario->consultorio->nombre_consultorio}}</td>
                     
                     <td style="text-align: center">
                        <div class="btn-group text-center" style="text-align: center" role="group" aria-label="Button group name">
                           <a href="{{url('/admin/horarios/'.$horario->id)}}"
                              class="btn btn-primary"
                           >
                           <i class="bi bi-eye-fill"></i>
                              Vista previa
                           </a>
                           <a href="{{url('/admin/horarios/'.$horario->id.'/edit')}}"
                              type="button"
                              class="btn btn-primary"
                           >
                           <i class="bi bi-highlighter"></i>
                              Editar
                           </a>
                           <a
                              href="{{url('/admin/horarios/'.$horario->id.'/delete')}}"
                              class="btn btn-primary"
                           >
                           <i class="bi bi-trash-fill"></i>
                              Borrar
                           </a>
                        </div>
                        
                     </td>
                   </tr>
                  @endforeach
               </tbody>
               
            </table>
          </div>
          

          <div
            class="table-responsive"
          >
            <table
               class="table table-bordered table-striped dataTable dtr-inline shadow-sm rounded bg-white"
            >
               <thead>
                  <tr>
                     <th scope="col">Horario<th>
                     <th scope="col">Lunes</th>
                     <th scope="col">Martes</th>
                     <th scope="col">Miercoles</th>
                     <th scope="col">Jueves</th>
                     <th scope="col">Viernes</th>
                  </tr>
               </thead>
               <tbody>
                  @php
                  $horas = ['8:00:00 - 9:00:00','9:00:00 - 10:00:00','10:00:00 - 11:00:00','11:00:00 - 12:00:00','12:00:00 - 13:00:00','13:00:00 - 14:00:00', '14:00:00 - 15:00:00', '15:00:00 - 16:00:00', '16:00:00 - 17:00:00', '17:00:00 - 18:00:00', '18:00:00 - 19:00:00', '19:00:00 - 20:00:00'];
   
                  $dias_semana = ['Lunes','Martes','Miercoles','Jueves','Viernes','Sábado','Domingo'];
             @endphp
             @foreach ($horas as $hora)
                  @php
                     list($hora_inicio,$hora_fin) = explode(' - ',$hora);
                  @endphp
                  <tr class="">
                     <td scope="row">{{$hora}}</td>
                     @foreach ($dias_semana as $dia)
                        @php
                           $medico = '';
                           @foreach ($horario as $horario)
                                 if(strtoupper ($horario->dia) == $dia && $hora_inicio >= $hora->hora_inicio){
                                    
                                 }
                                     

                                    /*
                                       <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                                    */
                                 
                           @endforeach
                        @endphp
                     @endforeach
                  </tr>

               @endforeach
               </tbody>
            </table>
          </div>
          
      </div>
   </div>

@endsection