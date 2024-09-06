
<!DOCTYPE html>
<!--
Inicio documento del HTML.
-->
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Jesus Médico | Inicio</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href=" {{url('plugins/fontawesome-free/css/all.min.css')}} ">
  <!-- Theme style -->
  <link rel="stylesheet" href=" {{url('dist/css/adminlte.min.css')}} ">
  <!-- Mis estilos -->
  <link rel="stylesheet" href=" {{url('styles/theme/app.css')}} ">
  <!--Iconos-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!--data table-->
<link rel="stylesheet" href="{{url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

  
  <!--sweetalert-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- jQuery -->
  <script src=" {{url('plugins/jquery/jquery.min.js')}} "></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

     
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/admin')}}" class="brand-link">
      <img src="{{url('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Jesus Médico</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{url('/admin')}}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Modulo usuarios -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas bi bi-people-fill"></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/usuarios')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/usuarios')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agregar usuario</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Modulo secretarias -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas bi bi-people-fill"></i>
              <p>
                Secretarias
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/secretarias')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de secretarias</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/secretarias/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agregar secretaria</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Modulo pacientes -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas bi bi-people-fill"></i>
              <p>
                Pacientes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/pacientes')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de pacientes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/pacientes/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agregar paciente</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Modulo consultorios -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas bi bi-people-fill"></i>
              <p>
                Consultorios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/consultorios')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de consultorios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/consultorios/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agregar consultorio</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Modulo consultorios -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas bi bi-people-fill"></i>
              <p>
                doctores
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/doctores')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de doctores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/doctores/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agregar consultorio</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Modulo horarios -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas bi bi-people-fill"></i>
              <p>
                horarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/horarios')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de horarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/horarios/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agregar Horario</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas bi bi-door-closed-fill"></i>
              <p>
                Cerrar sesión
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!--main contenido modificacion-->
  <div class="content-wrapper">
      <div class="container p-4" id="root">
         @yield('content')
      </div>
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        <a href="#">Algun enlace por aqui</a>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="#">Hecho por Bryan Emmanuel</a>.</strong> Todos los derechos reservados.
  </footer>
  
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- Bootstrap 4 -->

<script src=" {{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}} "></script>
<!--Data table-->
<script src="{{url('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{url('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{url('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<!-- AdminLTE App -->
<script src=" {{url('dist/js/adminlte.min.js')}} "></script>

</body>
</html>
