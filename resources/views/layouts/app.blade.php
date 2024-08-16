<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{config('app.name', 'PRESSING')}} | Dashboard </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- CSRF Token -->
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>


  <style type="text/css">
    @media print{
      @page { margin: 0; }
      body{ margin: 1.6cm; }
    }
  </style>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-green sidebar-mini">

<!-- Load page -->
<div class="animationload">
  <div class="loader"></div>
</div>

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
          <!-- Notifications: style can be found in dropdown.less -->
           <!--<li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>-->
                <!-- inner menu: contains the actual data -->
                <!--<ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                </ul>-->
              <!--</li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>-->
          <!-- Tasks: style can be found in dropdown.less -->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              @if(auth()->user()->picture == '')
                <img src="{{asset('public/avatar.jpeg')}}" class="user-image" alt="User Image">
              @else
                <img src="{{ url('public/storage/profile_images/'.auth()->user()->picture) }}" class="user-image" alt="User Image">
              @endif
              <span class="hidden-xs">{{ auth()->user()->fullname }} - {{ auth()->user()->getRoleNames()->first() }}</span>
            </a>


            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                @if(auth()->user()->picture == '')
                  <img src="{{asset('public/avatar.jpeg')}}" class="img-circle" alt="User Image">
                @else
                  <img src="{{ url('public/storage/profile_images/'.auth()->user()->picture) }}" class="img-circle" alt="User Image">
                @endif

                <p>
                  {{ auth()->user()->fullname }} - {{ auth()->user()->getRoleNames()->first() }}
                </p>
              </li>z
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Quitter</a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf
                    </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

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
            <img src="{{asset('avatar.jpeg')}}" class="img-circle" alt="User Image">
          @else
            <img src="{{ url('storage/profile_images/'.auth()->user()->picture) }}" class="img-circle" alt="User Image">
          @endif
        </div>
        <div class="pull-left info">
          <p>{{ auth()->user()->fullname }} - {{ auth()->user()->getRoleNames()->first() }}</p>
          <i>{{ auth()->user()->agency()->name }} - {{ auth()->user()->agency()->pressing()->name }}</i> <br>
          <a href="#"><i class="fa fa-circle text-success"></i> En ligne</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">

        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      @include('inc.menu')
    </section>
    <!-- /.sidebar -->
  </aside>

{{----------------------------------------------------}}

  <div class="content-wrapper">
    @yield('content')
    <div class="clearfix"></div>
  </div>

  {{----------------------------------------------------}}

  <footer class="main-footer no-print">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.1
    </div>
    <strong>Copyright &copy; 2019 <a href="https://sparkcorporation.org/" target="_blank">Developpé par</a> <a href="#">SPARK CORPORATION</a>.</strong> Tous Droits Reservés.
  </footer>

  <button class="material-scrolltop bg-olive" type="button"></button>

</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
{{-- <script src="{{asset('public/bower_components/jquery/dist/jquery.min.js') }}"></script> --}}

<script type="text/javascript">

      // $('#name').keyup(function(){
      //     $(this).val($(this).val().toUpperCase());
      // });

      $('#title').keyup(function(){
          $(this).val($(this).val().toUpperCase());
      });

      $('#fullname').keyup(function()
        {
            var str = $('#fullname').val();


            var spart = str.split(" ");
            for ( var i = 0; i < spart.length; i++ )
            {
                var j = spart[i].charAt(0).toUpperCase();
                spart[i] = j + spart[i].substr(1);
            }

          $('#fullname').val(spart.join(" "));

        });
</script>
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
<!-- Morris.js charts -->
<script src="{{asset('public/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{asset('public/bower_components/morris.js/morris.min.js') }}"></script>
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
      "order" : [[0, "desc"]],
      "language": {
        "search" : "Recherche:",
        "oPaginate":{
          "sFirst":"Premier",
          "sLast":"Dernier",
          "sNext":"Suivant",
          "sPrevious":"Précédent"
        },
        "sInfo" : "Montrer _START_ à _END_ des _TOTAL_ données",
        "sInfoEmpty" : "Montrer 0 à 0 des 0 données",
        "sInfoFiltered" : "trié des _MAX_ données totales",
        "sEmptyTable" : "Pas de données disponible dans la table",
        "sLengthMenu" : "Montrer _MENU_ données",
        "sZeroRecords" : "Aucune donnée correspondante trouvée"
      }
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

@stack('rate')
@stack('js')
@stack('scriptdelivery')
@stack('etat')
@stack('capitalize')
@stack('script')
@stack('customer')
@stack('deposit')
@stack('delivery')
@stack('user')
@stack('search')
@stack('control')
@stack('getcustomer')
@stack('codesuffixe')
@stack('deliveryhour')
@stack('loyalgroup')
@stack('clientgroup')
</body>
</html>

