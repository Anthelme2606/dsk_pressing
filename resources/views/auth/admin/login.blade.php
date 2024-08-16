<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{config('app.name', 'PRESSING')}} | Connexion</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{asset('public/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('public/bower_components/font-awesome/css/font-awesome.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{asset('public/bower_components/Ionicons/css/ionicons.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('public/dist/css/AdminLTE.min.css') }}">
        <!-- Material Design -->
        <link rel="stylesheet" href="{{asset('public/dist/css/bootstrap-material-design.min.css') }}">
        <link rel="stylesheet" href="{{asset('public/dist/css/ripples.min.css') }}">
        <link rel="stylesheet" href="{{asset('public/dist/css/MaterialAdminLTE.min.css') }}">
        <!-- Material ScrollTop stylesheet -->
        <link rel="stylesheet" href="{{asset('public/bower_components/material-scrolltop-master/src/material-scrolltop.css') }}">


        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>

<body class="hold-transition green layout-top-nav">
  <header class="main-header">

  </header>
  <div class="register-box" style="">
    <div class="register-logo">
      <a href="/" style="color: black;"><span style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:28px;">SPARK</span> CORPORATION</a>
    </div>
    <div class="register-box-body">

      <p class="login-box-msg" style="color: rgb(40, 96, 74);">Connexion</p>
      @include('inc.messages')
      <form method="POST" action="{{ route('superadmin.login.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group has-feedback">
          <input type="email" name="email" class="form-control" placeholder="Adresse Email">
          <span class="glyphicon glyphicon-phone form-control-feedback"></span>

          @if ($errors->has('email'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif

        </div>

        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Mot de passe">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>

          @if ($errors->has('password'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
        </div>

        <br/>
        <div class="row">

          <!-- /.col -->
          <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-raised btn-block btn-flat" style="background-color: rgb(40, 96, 74);">Se connecter</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
  </div>



  <!-- material-scrolltop button -->
  <button class="material-scrolltop bg-olive" type="button"></button>

  <!-- jQuery 3 -->
  <script src="{{asset('public/bower_components/jquery/dist/jquery.min.js') }}"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{asset('public/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <!-- Material Design -->
  <script src="{{asset('public/dist/js/material.min.js') }}"></script>
  <script src="{{asset('public/dist/js/ripples.min.js') }}"></script>
  <script>
      $.material.init();
  </script>
  <!-- material-scrolltop plugin -->
  <script src="{{asset('bower_components/material-scrolltop-master/src/material-scrolltop.js ') }}"></script>

  <!-- Initialize material-scrolltop with (minimal) -->
  <script>
      $('body').materialScrollTop();
  </script>
</body>
</html>
