
<div
            class="table-responsive"
          >
<table
               class="table table-bordered table-striped dataTable dtr-inline shadow-sm rounded bg-white"
            >
               <thead>
                  <tr>
                     <style>
                         th.bug_th + th {
        display: none !important;
    }
                     </style>
                     <th scope="col" class="bug_th">Horario<th>
                     <th>Lunes</th>
                     <th>Martes</th>
                     <th>Miercoles</th>
                     <th>Jueves</th>
                     <th>Viernes</th>
                     <th>Sábado</th>
                     <th>Domingo</th>
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
                            foreach ($horarios as $horario)
                                 if($horario->dia_horario == $dia && $hora_inicio >= $horario->hora_inicio_horario && $hora_fin <= $horario->hora_fin_horario){      
                                    $medico = $horario->doctor->nombre_doctor." ".$horario->doctor->apellidos_doctor." - ".$horario->consultorio->nombre_consultorio;
                                    break;
                                 }       
                        @endphp
                           <td>{{$medico}}</td>
                     @endforeach
                  </tr>

               @endforeach
               </tbody>
            </table>
</div>