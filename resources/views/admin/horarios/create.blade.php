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
                <label>Consultorio</label>
                <select class="form-control" name="consultorio_id" id="consultorio_select">
                      @foreach ($consultorios as $consultorio)
                          <option value="{{$consultorio->id}}">
                               {{$consultorio->nombre_consultorio}}
                          </option>
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

    <div class="p-3 data_consultorio" id="consultorio_info"></div>
          

    <script>
      $('#consultorio_select').on('change',function() {
                  const consultorio_id = $('#consultorio_select').val();
                   if(consultorio_id) {
                      $.ajax({
                           url: "{{ url('/admin/horarios/consultorios') }}" + '/' + consultorio_id,
                           type:'GET',
                           success:function(data) {
                                $('#consultorio_info').html(data);
                           },
                           error: function() {
                                 alert("Error al obtener el consultorio");
                           }
                      });
                   }else{
                    $('#consultorio_info').html('');
                   }
      });
    </script>

    </div>

   </div>
   </div>
@endsection


