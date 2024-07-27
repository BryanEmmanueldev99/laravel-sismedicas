@extends('layouts.admin')
@section('content')
   <div class="row">
      <h1>Listado de secretarias</h1>

      <div class="mt-3 container">
           <a href="{{url('admin/secretarias/create')}}" class="btn btn-primary">Agregar secretarias</a>
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
                     <th scope="col">Apellidos</th>
                     <th scope="col">Correo</th>
                     <th scope="col">Celular</th>
                     <th scope="col">DNI</th>
                     <th scope="col">Fecha de nacimiento</th>
                     <th scope="col">Acciones</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $contador_id = 1;  ?>
                  @foreach ($secretarias as $secretaria) 
                   <tr class="">
                     <td style="text-align: center" scope="row">{{$contador_id++}}</td style="text-align: center">
                     <td style="text-align: center">{{$secretaria->nombre_secretaria}}</td>
                     <td style="text-align: center">{{$secretaria->apellido_secretaria}}</td>
                     <td style="text-align: center">{{$secretaria->user->email}}</td>
                     <td style="text-align: center">{{$secretaria->celular_secretaria}}</td>
                     <td style="text-align: center">{{$secretaria->dni_secretaria}}</td>
                     <td style="text-align: center">{{$secretaria->fecha_nacimiento_secretaria}}</td>
                     <td style="text-align: center">
                        <div class="btn-group text-center" style="text-align: center" role="group" aria-label="Button group name">
                           <a href="{{url('admin/secretarias/'.$secretaria->id)}}"
                              class="btn btn-primary"
                           >
                           <i class="bi bi-eye-fill"></i>
                              Vista previa
                           </a>
                           <a href="{{url('admin/secretarias/'.$secretaria->id.'/edit')}}"
                              type="button"
                              class="btn btn-primary"
                           >
                           <i class="bi bi-highlighter"></i>
                              Editar
                           </a>
                           <a
                              href="{{url('admin/secretarias/'.$secretaria->id.'/delete')}}"
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

   <script>
      $(function () {
          $("#example1").DataTable({
              "pageLength": 10,
              "language": {
                  "emptyTable": "No hay información",
                  "info": "Mostrando inicio a fin del TOTAL Secretarias",
                  "infoEmpty": "Mostrando 0 a 0 de 0 Secretarias",
                  "infoFiltered": "(Filtrado de MAX total Secretarias)",
                  "infoPostFix": "",
                  "thousands": ",",
                  "lengthMenu": "Todos los Secretarias",
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