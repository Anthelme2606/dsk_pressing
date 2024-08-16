<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo e(config('app.name', 'PRESSING')); ?> | Page d'inscription</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo e(asset('public/bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('public/bower_components/font-awesome/css/font-awesome.min.css')); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo e(asset('public/bower_components/Ionicons/css/ionicons.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('public/dist/css/AdminLTE.min.css')); ?>">
  <!-- Material Design -->
  <link rel="stylesheet" href="<?php echo e(asset('public/dist/css/bootstrap-material-design.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('public/dist/css/ripples.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('public/dist/css/MaterialAdminLTE.min.css')); ?>">

  <link rel="stylesheet" href="<?php echo e(asset('public/bower_components/material-scrolltop-master/src/material-scrolltop.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('public/dist/css/skins/all-md-skins.min.css')); ?>">



  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition green layout-top-nav">
  <header class="main-header">
    <nav class="navbar navbar-static-top" style="background-color: rgb(60, 86, 78);">
      <div class="container">
        <div class="navbar-header">
          <img src="<?php echo e(asset('public/website/images/Se.jpeg')); ?>" height="65px;" alt=""/>
          
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">

        </div>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="" style="margin-top:5%;">
              <span style="font-size: 32px; font-family:Brush Script MT, Brush Script Std, cursive;"><em><i style="color: rgb(209, 203, 119);">Textile expert</i></em></span>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <div class="register-box" style="height: 100%">
    <div class="register-logo">
      <a href="/" style="color: black;"><span style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:28px;">ÉLÉGANCE</span> <b>PRESSING</b></a>
    </div>
    <div class="register-box-body">

      <p class="login-box-msg" style="color: rgb(40, 96, 74);">Connexion</p>
      <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <form method="POST" action="<?php echo e(route('client.login.store')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <div class="form-group has-feedback">
          <input type="text" name="phone_number" class="form-control" placeholder="Numéro de Téléphone">
          <span class="glyphicon glyphicon-phone form-control-feedback"></span>

          <?php if($errors->has('phone_number')): ?>
              <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($errors->first('phone_number')); ?></strong>
              </span>
          <?php endif; ?>

        </div>

        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Mot de passe">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>

          <?php if($errors->has('password')): ?>
              <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($errors->first('password')); ?></strong>
              </span>
          <?php endif; ?>
        </div>

        <br/>
        <div class="row">
          <div class="col-xs-5" style="margin-top:2%;">
            <div class="checkbox">
              <a href="<?php echo e(route('client.register')); ?>" class="text-center"><b style="color: rgb(40, 96, 74);">S'inscire ?</b></a>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-7">
            <button type="submit" class="btn btn-primary btn-raised btn-block btn-flat" style="background-color: rgb(40, 96, 74);">Se connecter</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
  </div>


  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.1
      </div>
      <strong>
        Copyright &copy; 2019 <a href="#" style="color: rgb(43, 124, 92);">Developpé par SPARK CORPORATION</a>.
      </strong> Tous Droits Reservés.
    </div>
  </footer>

  <!-- material-scrolltop button -->
  <button class="material-scrolltop bg-olive" type="button"></button>

<!-- jQuery 3 -->
<script src="<?php echo e(asset('public/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo e(asset('public/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<!-- Material Design -->
<script src="<?php echo e(asset('public/dist/js/material.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/dist/js/ripples.min.js')); ?>"></script>
<script>
    $.material.init();
</script>
<!-- material-scrolltop plugin -->
<script src="<?php echo e(asset('public/bower_components/material-scrolltop-master/src/material-scrolltop.js ')); ?>"></script>

<!-- Initialize material-scrolltop with (minimal) -->
<script>
    $('body').materialScrollTop();
</script>
</body>
</html>
<?php /**PATH /home/sparqrqm/public_html/testing/resources/views/auth/client/login.blade.php ENDPATH**/ ?>