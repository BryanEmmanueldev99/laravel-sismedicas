@extends('layouts.admin')
@section('content')
   <div class="row">
      <h1>Listado de consultorios</h1>

      <div class="mt-3 container">
           <a href="{{url('admin/consultorios/create')}}" class="btn btn-primary">Agregar consultorio</a>
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
                     <th scope="col">Nombre</th>
                     <th scope="col">Ubicacion</th>
                     <th>Capacidad</th>
                     <th>Telefono</th>
                     <th>Especialidad</th>
                     <th>Estado</th>
                     <th scope="col">Acciones</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $contador_id = 1;  ?>
                  @foreach ($consultorios as $consultorio)
                   <tr class="">
                     <td style="text-align: center" scope="row">{{$contador_id++}}</td style="text-align: center">
                     <td style="text-align: center">{{$consultorio->nombre_consultorio}}</td>
                     <td style="text-align: center">{{$consultorio->ubicacion_consultorio}}</td>
                     <td style="text-align: center">{{$consultorio->capacidad_consultorio}}</td>
                     <td style="text-align: center">{{$consultorio->telefono_consultorio}}</td>
                     <td style="text-align: center">{{$consultorio->especialidad_consultorio}}</td>
                     <td style="text-align: center">{{$consultorio->estado_consultorio}}</td>
                     <td style="text-align: center">
                        <div class="btn-group text-center" style="text-align: center" role="group" aria-label="Button group name">
                           <a href="{{url('/admin/consultorios/'.$consultorio->id)}}"
                              class="btn btn-primary"
                           >
                           <i class="bi bi-eye-fill"></i>
                              Vista previa
                           </a>
                           <a href="{{url('/admin/consultorios/'.$consultorio->id.'/edit')}}"
                              type="button"
                              class="btn btn-primary"
                           >
                           <i class="bi bi-highlighter"></i>
                              Editar
                           </a>
                           <a
                              href="{{url('/admin/consultorios/'.$consultorio->id.'/delete')}}"
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
          
      </div>
   </div>

@endsection