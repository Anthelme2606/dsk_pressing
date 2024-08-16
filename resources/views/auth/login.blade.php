<!DOCTYPE html>
<html class="no-js" lang="en">
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
    <nav class="navbar navbar-static-top" style="background-color: rgb(60, 86, 78);">
      <div class="container">
        <div class="navbar-header">
          <img src="{{ asset('public/website/images/z.png')}}" height="65px;" alt=""/>
          {{-- <a href="{{route('dashboard')}}" class="navbar-brand">ELEGANCE <b>PRESSING</b></a> --}}
          {{-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button> --}}
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

        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->


        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
<div class="login-box" style="height: 100%;">
  <div class="login-logo">
    <a href="/" style="color: black;"><span style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:28px;">ÉLÉGANCE</span> <b>PRESSING</b></a>
    {{-- <a href="{{route('dashboard')}}" style="color: black;">ELEGANCE <b>PRESSING</b></a> --}}
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    {{-- style="width: 130%; margin-left:-15%;" --}}

    <p class="login-box-msg">Connectez-vous pour commencer votre session</p>

    @if (session('message'))
        <div class="alert alert-danger" role="alert">{{ session('message') }} <a href="{{ route('licences.create') }}">Activer ici</a></div>
    @endif

    @include('inc.messages')

    <form method="POST" action="{{ route('login') }}">
                        @csrf

      <div class="form-group has-feedback">
        <input type="text" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
      </div>

      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Mot de Passe">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>


                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
      </div>
      <br><div class="row">
        <div class="col-xs-6">
          <div class="checkbox">
            <label>
              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            </label> <b style="color: rgb(40, 96, 74);">Se souvenir de moi</b>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <button type="submit" class="btn btn-primary btn-raised btn-block btn-flat" style="border-radius: 3px; background-color: rgb(40, 96, 74);">connexion</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    {{-- <a href="{{ route('password.request') }}">Mot de passe oublié</a><br> --}}
    {{-- <a href="{{route('register')}}" class="text-center">Inscription</a> --}}

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
      </div>
      <strong>Copyright &copy; 2019 <a href="#">Developpé par</a> <a href="#">SPARK CORPORATION</a>.</strong> Tous Droits Reservés.
    </div>
    <!-- /.container -->
  </footer>

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
<script src="{{asset('public/bower_components/material-scrolltop-master/src/material-scrolltop.js ') }}"></script>

<!-- Initialize material-scrolltop with (minimal) -->
<script>
    $('body').materialScrollTop();
</script>
<!-- iCheck -->
<!-- <script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>-->
</body>
</html>







{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
--}}
