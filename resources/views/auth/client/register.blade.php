<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{config('app.name', 'PRESSING')}} | Page d'inscription</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!-- iCheck -->
  <!-- <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css"> -->
    <!-- Material ScrollTop stylesheet -->
  <link rel="stylesheet" href="{{asset('public/bower_components/material-scrolltop-master/src/material-scrolltop.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('public/dist/css/skins/all-md-skins.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition green layout-top-nav">
  {{-- style="background-image: url('website/images/nveau.jpg'); background-repeat:no-repeat; background-size:cover;" --}}
  <header class="main-header" style="margin-bottom: -8%;">
    <nav class="navbar navbar-static-top" style="background-color: rgb(60, 86, 78);">
      <div class="container">
        <div class="navbar-header">
          <img src="{{ asset('public/uwebsite/images/z.png')}}" height="65px;" alt="">

      {{-- <a href="/" class="navbar-brand">ÉLÉGANCE <b>PRESSING</b></a> --}}
      {{-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>--}}
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">

        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->






        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="" style="margin-top:8%;">
              <span style="font-size: 180%; font-family:Brush Script MT, Brush Script Std, cursive;"><em><i style="color: #D6B861;">Textile expert</i></em></span>
            </li>
          </ul>
        </div>





        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>


  <main class="imgbg" style="height: 100%; margin-bottom: 45%;">


    <div class="register-box" style="width: 90%; padding-top: 5%;">
      <div class="register-logo">
        <p style="font-family: georgia; color:black; font-size:24px;">Soyez parmi les <span style="color: #D6B861;"> 100 premiers</span> inscrits pour bénéficier de <span style="color: #D6B861">5 lavages</span> (habits) gratuits dès l'ouverture ! </p>

        {{--rgb(40, 96, 74)--}}
      </div>
    </div>
  </div>

  <div class="register-box" style="width: 90%; margin-top: -50px;">
    <div class="register-logo">
      <a href="/" style="color: black;"><span style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:24px;">ÉLÉGANCE</span> <b style="font-size:32px;">PRESSING</b></a>
    </div>

      <div class="register-box-body">
        @include('inc.messages')
        <form enctype="multipart/form-data" method="post" action="{{ route('client.register.store') }}" onsubmit="launchRequest()">
          @csrf

          <div class="row">
            <div class="col-md-6 col-md-offset-0">
              <div class="form-group has-feedback">
                <label for="" style="color: black;">Nom et prénoms <span style="color: red;">*</span></label>
                <input type="text" class="form-control" placeholder="Veuillez saisir votre nom complet" style="text-transform: capitalize;" name="fullname" value="{{ old('fullname') }}" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                {{-- style="color: rgb(216, 31, 31);" --}}

                @if ($errors->has('fullname'))
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $errors->first('fullname') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="col-md-6 col-md-offset-0">
              <div class="form-group has-feedback">
                <label for="" style="color: black;">Numéro de téléphone mobile <span style="color: red;">*</span></label>
                <input type="phone" name="phone_number" class="form-control" placeholder="Ex: 01 0200 2200" value="{{ old('phone_number') }}" required>
                <span class="glyphicon glyphicon-phone form-control-feedback"></span>

                @if ($errors->has('phone_number'))
                    <span class="invalid-feedback" role="alert">
                        <strong style="color:red;">{{ $errors->first('phone_number') }}</strong>
                    </span>
                @endif

              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-md-6 col-md-offset-0">
              <div class="form-group has-feedback">
                <label for="" style="color: black;">Mot de passe <span style="color: red;">*</span></label>
                <div class="row">
                  <div class="col-md-11">
                    <input type="password" name="password" class="form-control" placeholder="Veuillez définir un mot de passe" id="pwd" onchange="confirm()" value="{{ old('password') }}" required/>
                  </div>
                  <div class="col-md-1">
                    <span class="form-feedback pull-right">
                      <i type="button" class="fa fa-eye-slash" id="icon_pwd"  onclick="show_password()"></i>
                    </span>
                  </div>
                </div>
                <style>
                  #icon_pwd{
                    cursor: pointer;
                  }

                  #icon_confirm{
                    cursor: pointer;
                  }
                </style>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong style="color:red;">{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="col-md-6 col-md-offset-0">
              <div class="form-group has-feedback">
                <label for="" style="color: black;">Confirmation de mot de passe <span style="color: red;">*</span></label>
                <div class="row">
                  <div class="col-md-11">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Veuillez resaisir votre mot de passe " id="pwd_confirm" onchange="confirm()" value="{{ old('password_confirmation') }}" required/>
                  </div>
                  <div class="col-md-1">
                    <span class="form-feedback pull-right">
                      <i class="fa fa-eye-slash" id="icon_confirm" type="button" style="margin-right: 10px; margin-top: 12px;" onclick="show_password_c()"></i>
                    </span>
                  </div>
                </div>

                <small id="message"></small>
                <style>
                  @media only screen and (min-width: 600px){
                    #icon_pwd{
                      /* margin-right: 10px; margin-top: 12px; */
                    }
                  }
                  @media only screen and (max-width: 600px) {
    #pwd{
      width: 85%;
    }
    #icon_pwd{
      width: 15%;
      padding-bottom: 35%;
      display: inline;
    }
  }
                </style>
                <script>

                  function show_password_c(){
                    let pwd_confirm = document.getElementById('pwd_confirm');
                    let icon_pwd_confirm = document.getElementById("icon_confirm")
                    if(pwd_confirm.type == "password"){
                      pwd_confirm.type = "text";
                      icon_pwd_confirm.className = "fa fa-eye-slash"
                    } else {
                      pwd_confirm.type = "password";
                      icon_pwd_confirm.className = "fa fa-eye"
                    }
                  }

                  function show_password(){
                    let icon_pwd = document.getElementById('icon_pwd');
                    let pwd = document.getElementById('pwd')
                    if(pwd.type == "password"){
                      pwd.type = "text";
                      icon_pwd.className = "fa fa-eye-slash"
                    } else {
                      pwd.type = "password";
                      icon_pwd.className = "fa fa-eye"
                    }

                  }
                  $('#pwd_confirm').keyup(function() {
                      var password = $('#pwd')
                      var pwd_confirm = $(this)
                      var message = $('#message')
                      var submit = $('#register_btn')
                      if (confirm.val() !== password.val()) {
                          console.log(confirm.val() + ' === ' + password.val())
                          message.html('La confirmation ne correspond pas au mot de passe').css("color", "red")
                      } else {
                          message.html('Confirmation correcte').css("color", "green")
                      }
                  })
                  function confirm(){
                    let pwd = document.getElementById('pwd').value;
                    let pwd_confirm = document.getElementById('pwd_confirm').value;
                    let message = document.getElementById('message');
                    if(pwd == pwd_confirm){
                      message.style.color = 'green';
                      message.innerHTML = "La confirmation correspond au mot de passe"

                    } else {
                      message.style.color = 'red';
                      message.innerHTML = "La confirmation ne correspond pas au mot de passe"
                    }
                  }


                </script>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-md-offset-0">
              <div class="form-group has-feedback">
                <label for="" style="color: black;">Adresse e-mail</label>
                <input type="email" name="email" class="form-control" placeholder="Email" id="email" value="{{ old('email') }}"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <script>
                  let email = document.getElementById('email');
                  email.addEventListener("input", ()=> {
                    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value))
                    {
                      msg.style.color = 'green';
                      msg.innerHTML = "L'email est valide"
                    } else{
                      msg.style.color = 'red';
                      msg.innerHTML = "L'email n'est pas valide";
                    }
                  })
                </script>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $errors->first('email') }}</strong>
                    </span>
                @endif

              </div>
              <small id="msg"></small>

            </div>
            <div class="col-md-6 col-md-offset-0">
                <div class="form-group has-feedback">
                    <label for="" style="color: black;">Adresse de résidence</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address') }}" placeholder="Votre adresse ..."/>
                    <span class="glyphicon glyphicon-home form-control-feedback"></span>

                    @if ($errors->has('address'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif

                </div>
            </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-md-offset-0">
                <div class="form-group has-feedback">
                    <label for="" style="color: black;">Date de naissance :</label>
                    <input type="date" name="birthday" class="form-control" value="{{ old('birthday') }}" placeholder="Date de naissance*">
                    {{-- <span class="glyphicon glyphicon-calendar form-control-feedback"></span> --}}

                    @if ($errors->has('birthday'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('birthday') }}</strong>
                        </span>
                    @endif

                </div>
                </div>
                <div class="col-md-6 col-md-offset-0">
                <div class="form-group has-feedback">
                    <label for="" style="color: black;">Qu'attendez vous d'un pressing Professionnel ?</label>
                    <input type="text" name="waiting_for" class="form-control" placeholder="Vos attentes vis-à-vis d'Elégance Pressing"/>
                    <span class="glyphicon glyphicon-comment form-control-feedback" style="color: rgb(40, 96, 74);"></span>

                    @if ($errors->has('waiting_for'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('waiting_for') }}</strong>
                        </span>
                    @endif


                </div>
                </div>
            </div>


            <br/>
            <div class="row">
                <div class="col-xs-12">
                    <div class="checkbox">
                    <label>
                        <input type="checkbox" onClick="checkbox();" id="terms">
                    </label>
                    <a href="#" class="text-center" style="color: rgb(40, 96, 74); font-family:arial; font-size:14px; font-weight:500;" >J'accepte les conditions générales d'utilisation</a>
                    </div>
                </div>
                <div class="" style="margin: 10px;">
                    <button type="submit" class="btn btn-primary btn-raised btn-block btn-flat text-center" style="background-color: rgb(40, 96, 74); border-radius:4px;" id="register_btn" disabled="true" title="Veuillez remplir tous les champs marqués d'un astérisque (*) rouge !">S'inscrire</button>
                </div>
            </div>
            <br/>
            <div class="text-center" style="margin-top: 10px; font-family: georgia; color:black; font-size:24px;">
                Route de Bingerville, à 100 mètres sur la gauche après le carrefour <em style="color: #D6B861;">FEH KESSE</em>
            </div>
            <br/>


        </form>
      </div>
    </div>
</main>
    <footer class="main-footer">
      <div class="container">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.1
        </div>
        <strong>Copyright &copy; 2019 <a href="#" style="color: rgb(43, 124, 92);">Developpé par SPARK CORPORATION</a>.</strong> Tous Droits Reservés.
      </div>

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
    <script src="{{asset('public/pbower_components/material-scrolltop-master/src/material-scrolltop.js ') }}"></script>

    <!-- Initialize material-scrolltop with (minimal) -->
    <script>
        $('body').materialScrollTop();
    </script>
    <script>
    function checkbox() {
        let pwd = document.getElementById('pwd').value;
        let pwd_confirm = document.getElementById('pwd_confirm').value;

        let email = document.getElementById('email');

        if (document.getElementById('terms').checked && pwd != "" && pwd == pwd_confirm ) {
            document.getElementById('register_btn').disabled = false;
        } else {
            document.getElementById('register_btn').disabled = true;
        }
    }



    </script>



</body>
</html>
