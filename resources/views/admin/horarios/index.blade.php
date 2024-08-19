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
          

          
          <div class="p-3 row mt-2">
              <label>Consultorio</label>
               <select class="form-control" name="consultorio_id" id="consultorio_select">
                     @foreach ($listado_de_consultorios as $consultorio)
                         <option value="{{$consultorio->id}}">
                              {{$consultorio->nombre_consultorio}}
                         </option>
                     @endforeach
               </select>
          </div>

          
           <div class="p-3 data_consultorio" id="consultorio_info"></div>
          
      </div>
   </div>
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
    <script>
      $(function () {
          $("#example1").DataTable({
              "pageLength": 10,
              "language": {
                  "emptyTable": "No hay información",
                  "info": "Mostrando inicio a fin del TOTAL Horarios",
                  "infoEmpty": "Mostrando 0 a 0 de 0 Horarios",
                  "infoFiltered": "(Filtrado de MAX total Horarios)",
                  "infoPostFix": "",
                  "thousands": ",",
                  "lengthMenu": "Todos los Horarios",
                  "loadingRecords": "Cargando...",
                  "processing": "Procesando...",
                  "search": "Buscador:",
                  "zeroRecords": "Sin resultados encontrados",
                  "paginate": {
                      "first": "Primero",
                      "last": "Ultimo",
                      "next": "Siguiente",
                      "previous": "Anterior"
                  }
              },
              "responsive": true, "lengthChange": true, "autoWidth": false,
              buttons: [{
                  extend: 'collection',
                  text: 'Reportes',
                  orientation: 'landscape',
                  buttons: [{
                      text: 'Copiar',
                      extend: 'copy',
                  }, {
                      extend: 'pdf'
                  },{
                      extend: 'csv'
                  },{
                      extend: 'excel'
                  },{
                      text: 'Imprimir',
                      extend: 'print'
                  }
                  ]
              },
                  {
                      extend: 'colvis',
                      text: 'Visor de columnas',
                      collectionLayout: 'fixed three-column'
                  }
              ],
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      });
    </script>
@endsection
