@extends('layouts.admin')
@section('content')
   <div class="container">
      <h2>Agregar horario</h2>
      <hr>

      <div class="info-create w-50 mx-auto shadow-sm p-2 rounded bg-white d-flex-wc">
          <p>
            <i class="bi bi-exclamation-circle-fill red-icon"></i> Por favor, llene los datos con cuidado.
          </p>
      </div>

      <div class="w-50 mx-auto container mt-4">
      
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
   </div>
@endsection


