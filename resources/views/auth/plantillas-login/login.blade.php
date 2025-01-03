<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $url ?>public/templates/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo $url ?>public/templates/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $url ?>public/templates/AdminLTE-3.2.0/AdminLTE-3.2.0/dist/css/adminlte.min.css">

  <!--Sweet alert-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="hold-transition login-page" style="background-color: ghostwhite;">
<div class="login-box">


<?php 
session_start();

if(isset($_SESSION['mensaje_login'])){
      $respuesta = $_SESSION['mensaje_login'];  ?>
      <script>
    Swal.fire({
  position: "center",
  icon: "error",
  title: "<?php echo $respuesta; ?>",
  showConfirmButton: false,
  timer: 1200
});
     </script>
<?php }  unset($_SESSION['mensaje_login']);

?>     

  <!-- /.login-logo -->
  <div class="card card-outline card-primary shadow">
    <div class="card-header text-center">
      <h2>Iniciar sesión</h2>
      <picture>
          <img class="img-fluid" width="100px" src="<?= $url; ?>/public/img/login-default.png" alt="login">
      </picture>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Introduce tus credenciales</p>

      <form action="../app/controllers/login/ingreso.php" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" id="email_user_verify" class="form-control" placeholder="Correo eléctronico">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        
        <div class="input-group mb-3">
          <input type="password" name="password_user" class="form-control" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
      <!-- /.social-auth-links -->

      
      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo $url; ?>public/templates/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo $url ?>public/templates/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $url ?>public/templates/AdminLTE-3.2.0/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
</body>
</html>