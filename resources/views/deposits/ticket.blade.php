<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title class="no-print">{{config('app.name', 'PRESSING')}} | Facture</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('public/dist/css/skins/all-md-skins.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('public/bower_components/morris.js/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('public/bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('public/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <!-- Material ScrollTop stylesheet -->
  <link rel="stylesheet" href="{{asset('public/bower_components/material-scrolltop-master/src/material-scrolltop.css') }}">

  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>-->
  <style type="text/css">
    @media print{

      @page { margin: 0; }
      body{ margin: 1.6cm; }
    }
  </style>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-green sidebar-mini" >

<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{route('dashboard')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">S<b>P</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">SPARK <b>PRESSING</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>


      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              @if(auth()->user()->profile_picture == '')
                <img src="{{asset('public/storage/profile_images/user.jpg')}}" class="user-image" alt="User Image">
              @else
                <img src="{{ url('public/storage/profile_images/'.auth()->user()->profile_picture) }}" class="user-image" alt="User Image">
              @endif
              <span class="hidden-xs">{{ auth()->user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                @if(auth()->user()->profile_picture == '')
                  <img src="{{asset('public/storage/profile_images/user.jpg')}}" class="img-circle" alt="User Image">
                @else
                  <img src="{{ url('public/storage/profile_images/'.auth()->user()->profile_picture) }}" class="img-circle" alt="User Image">
                @endif

                <p>
                  {{ auth()->user()->name }}
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('profils.index') }}" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf
                    </form>
                </div>
              </li>
            </ul>
          </li>


        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          @if(auth()->user()->picture == '')
            <img src="{{asset('public/storage/profile_images/user.jpg')}}" class="img-circle" alt="User Image">
          @else
            <img src="{{ url('public/storage/profile_images/'.auth()->user()->picture) }}" class="img-circle" alt="User Image">
          @endif
        </div>
        <div class="pull-left info">
          <p>{{ auth()->user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> En ligne</a>
        </div>
      </div>

      @include('inc.menu')
    </section>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper" >

<!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Dépôt
          <small>PE / {{ $deposit->id }}</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
          <li class="active">Nouveau Dépôt</li>
        </ol>
    </section>

    <div class="pad margin no-print">
      <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Note:</h4>
        Pour imprimer cette page, veuillez cliquer sur le bouton d'impression en bas de la facture.
      </div>
    </div>
<!-- Main content -->
    <section class="invoice" style=" font-size: 12px; margin-left: 35%; margin-right:35%;">

      @include('inc.messages')

        <div class="row invoice-info">
        <br/><br/><br/>
      </div>
      <div class="row">
        <h3 class="text-center"><b>{{ $deposit->user()->agency()->pressing()->name }}</b></h3>
        <h4 class="text-center" style="font-style: italic;">By INNOV 720</h4>
        <h4 class="text-center">06 BP 6211 Abidjan</h4>
        <h4 class="text-center" style="font-style: italic;">Tel : 0141888989
        </h4>
        <!-- accepted payments column -->
        <h4 class="text-center" style=" margin-bottom: 25px; font-style: italic;">RCCM : CI – ABJ – 03 – 2022 – B13 - 08464
        </h4>
        <p style="text-align: center">N° CC : 2243843 D</p>



      </div>
      <br/>
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table">


          <tbody>
            @foreach ($depositedarticles as $depot)
            <tr>
                <td>
                    {{ $depot->quantity}} x {{ $depot->article()->name }}
                </td>



                <td>
                    à
                    @if($depot->type_action == 0)
                        {{ $depot->article()->classic_price}}
                    @endif

                    @if($depot->type_action == 1)
                        {{ $depot->article()->repass_price }}
                    @endif

                    @if($depot->type_action == 2)
                        {{ $depot->article()->express_price }}
                    @endif
                </td>

                <td>
                    @if($depot->type_action == 0)
                        {{ $depot->article()->classic_price * $depot->quantity}}
                    @endif

                    @if($depot->type_action == 1)
                        {{ $depot->article()->repass_price * $depot->quantity }}
                    @endif

                    @if($depot->type_action == 2)
                        {{ $depot->article()->express_price * $depot->quantity }}
                    @endif
                </td>
            </tr>


            @endforeach

          </tbody>

          </table>
          <div style="text-align: center;">
            <b>Montant total:</b>
                      {{ $deposit->total + $deposit->discount }} FCFA,
            <b>Remise:</b>
                      {{ $deposit->discount }} FCFA,
            <b>Net à payer:</b>
                      {{ $deposit->total }} FCFA,
            <b>Avance:</b> {{ $deposit->advanced }} FCFA,

            @if($deposit->total - $deposit->advanced > 0)
            <b>Reste à payer: </b>{{ abs($deposit->total - $deposit->advanced) }} FCFA
            @else
            <b>Relicat: </b>{{ abs($deposit->total - $deposit->advanced) }} FCFA
            @endif

          </div>

        </div>
      </div>


        <div class="row text-center">
            <div class="text-center" style="margin-top: 10px; font-family: georgia,serif; color:black; font-size: 16px; padding: 10%;">
                Route de Bingerville, à 100 mètres sur la gauche après le carrefour <em style="color: rgb(212, 205, 100);">FEH KESSE</em>
            </div>

     </div>
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Editer Date de livraison</h4>
                    </div>
                    <form method="POST" action="{{route('postdatelivraison')}}">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" name="deposit_id" class="form-control" value="{{$deposit->id}}" />

                                <input type="datetime" name="date_retrait" id="date" value="{{ $deposit->retrieve_date }}" onchange="setCorrect(this,'date');" class="form-control" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Editer</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a onClick="window.print()" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimer</a>
          @role('manager')
          <a href="" class="btn btn-success pull-right"><i class="fa fa-cart-arrow-down"></i> Liste Des Dépôts</a>
          @endrole
          {{-- <!--<a href="{{ route('deposit.invoice', $deposit->id) }}" class="btn btn-primary pull-right"> --}}

        </div>
      </div>
    </section>
  </div>

  <button class="material-scrolltop bg-olive" type="button"></button>


<!-- jQuery 3 -->
<script src="{{asset('public/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('public/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
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
<!-- DataTables -->
<script src="{{asset('public/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<!-- page script -->
<script type="text/javascript">
  $(function () {
    $('#example1').DataTable({
      "order" : [[0, "desc"]]
    })
  })
</script>
<!-- Sparkline -->
<script src="{{asset('public/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{asset('public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{asset('public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('public/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{asset('public/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{asset('public/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{asset('public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{asset('public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{asset('public/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/dist/js/demo.js') }}"></script>




<script>
  //function to convert enterd date to any format
  function setCorrect(xObj,xTarget){
  var today = new Date();
      var date = new Date(xObj.value);
      var month = date.getMonth() + 1;
      var day = date.getDate();
      var year = date.getFullYear();
      var monthd = today.getMonth() + 1;
      var dayd = today.getDate();
      var yeard = today.getFullYear();
      console.log(day+' '+ month +' '+year+'\n');
      console.log(dayd+' '+ monthd +' '+yeard);

      if(year<yeard){
              //console.log("modif1");
              if (dayd<10) {
                  document.getElementById(xTarget).value=yeard+"-"+monthd+"-0"+dayd;
              }else {
                  document.getElementById(xTarget).value=yeard+"-"+monthd+"-"+dayd;
              }
      }else if(year=yeard) {
          if(month<monthd){
          //console.log("modif2");
          if (dayd<10) {
              document.getElementById(xTarget).value=yeard+"-"+monthd+"-0"+dayd;
          }else {
              document.getElementById(xTarget).value=yeard+"-"+monthd+"-"+dayd;
          }
          }else if(month==monthd) {
              if(day<dayd){
                  //console.log("modif3");
                  if (dayd<10) {
                      document.getElementById(xTarget).value=yeard+"-"+monthd+"-0"+dayd;
                  }else {
                      document.getElementById(xTarget).value=yeard+"-"+monthd+"-"+dayd;
                  }
              }
          }
      }
  }

   </script>

</body>
</html>
