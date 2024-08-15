@extends('layouts.admin')
@section('content')
   <div class="container">
      <h2>Agregar horario</h2>
      <hr>


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

      <div class="info-create w-50 mx-auto shadow-sm p-2 rounded bg-white d-flex-wc">
          <p>
            <i class="bi bi-exclamation-circle-fill red-icon"></i> Por favor, llene los datos con cuidado.
          </p>
      </div>

      <div class="row">

      <div class="mt-4 col-md-3">
      
        <form class="bg-white shadow rounded p-3" action="{{url('/admin/horarios/create')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Dia: <b class="red">*</b></label>
                <input
                    type="text"
                    class="form-control"
                    name="dia_horario"
                    
                    placeholder=horario         
                    value="{{old('dia_horario')}}"
                />
                
                @error('dia_horario')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">hora_inicio_horario	: <b class="red">*</b></label>
                <input
                    type="time"
                    class="form-control"
                    name="hora_inicio_horario"
                    required
                    value="{{old('hora_inicio_horario')}}"
                />
                
                @error('hora_inicio_horario')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>

              <div class="mb-3">
                <label for="" class="form-label">hora_fin_horario	: <b class="red">*</b></label>
                <input
                    type="time"
                    class="form-control"
                    name="hora_fin_horario"
                    
                    required
                    value="{{old('hora_fin_horario')}}"
                />
                
                @error('hora_fin_horario')
                  <small class="red">{{$message}}</small>
                @enderror
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Médicos: <b class="red">*</b></label>
                <select class="form-control" name="doctor_id">
                  @foreach ($doctores as $doctor)
                     <option value="{{$doctor->id}}">{{$doctor->nombre_doctor}} - {{$doctor->especialidad_doctor}}</option>
                  @endforeach
                </select>       
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Consultorio</label>
                <select class="form-control" name="consultorio_id">
                  @foreach ($consultorios as $consultorio)
                     <option value="{{$consultorio->id}}">{{$consultorio->nombre_consultorio}}</option>
                  @endforeach
                </select>          
              </div>



              <div class="mb-3">
                 <input class="btn btn-primary btn-block" type="submit" value="Agregar nuevo horario">
              </div>
          </form>
          <div class="container mt-5">
            <a href="{{url('admin/horarios')}}" class="btn btn-primary">Regresar</a>
          </div>
      </div>

      <div
      class="table-responsive col-md-9"
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
                           if($horario->dia_horario == $dia && $hora_inicio >=     $horario->hora_inicio_horario && $hora_fin <= $horario->hora_fin_horario ){      
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

   </div>
   </div>
@endsection


