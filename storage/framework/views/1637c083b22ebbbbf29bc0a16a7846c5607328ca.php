<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title class="no-print"><?php echo e(config('app.name', 'PRESSING')); ?> | Facture</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo e(asset('/public/bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('/public/bower_components/font-awesome/css/font-awesome.min.css')); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo e(asset('/public/bower_components/Ionicons/css/ionicons.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('/public/dist/css/AdminLTE.min.css')); ?>">
  <!-- Material Design -->
  <link rel="stylesheet" href="<?php echo e(asset('/public/dist/css/bootstrap-material-design.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('/public/dist/css/ripples.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('/public/dist/css/MaterialAdminLTE.min.css')); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo e(asset('/public/dist/css/skins/all-md-skins.min.css')); ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('/public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo e(asset('/public/bower_components/morris.js/morris.css')); ?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo e(asset('/public/bower_components/jvectormap/jquery-jvectormap.css')); ?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo e(asset('/public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')); ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo e(asset('/public/bower_components/bootstrap-daterangepicker/daterangepicker.css')); ?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo e(asset('/public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')); ?>">
  <!-- Material ScrollTop stylesheet -->
  <link rel="stylesheet" href="/public<?php echo e(asset('/public/bower_components/material-scrolltop-master/src/material-scrolltop.css')); ?>">

  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>-->
  <style type="text/css">
    @media  print{
      @page  { margin: 0; }
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

<body class="hold-transition skin-green sidebar-mini">

<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo e(route('dashboard')); ?>" class="logo">
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
              <?php if(auth()->user()->profile_picture == ''): ?>
                <img src="<?php echo e(asset('/storage/profile_images/user.jpg')); ?>" class="user-image" alt="User Image">
              <?php else: ?>
                <img src="<?php echo e(url('/storage/profile_images/'.auth()->user()->profile_picture)); ?>" class="user-image" alt="User Image">
              <?php endif; ?>
              <span class="hidden-xs"><?php echo e(auth()->user()->name); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php if(auth()->user()->profile_picture == ''): ?>
                  <img src="<?php echo e(asset('/storage/profile_images/user.jpg')); ?>" class="img-circle" alt="User Image">
                <?php else: ?>
                  <img src="<?php echo e(url('/storage/profile_images/'.auth()->user()->profile_picture)); ?>" class="img-circle" alt="User Image">
                <?php endif; ?>

                <p>
                  <?php echo e(auth()->user()->name); ?>

                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo e(route('profils.index')); ?>" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo e(route('logout')); ?>" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                  <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;"><?php echo csrf_field(); ?>
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
          <?php if(auth()->user()->picture == ''): ?>
            <img src="<?php echo e(asset('/storage/profile_images/user.jpg')); ?>" class="img-circle" alt="User Image">
          <?php else: ?>
            <img src="<?php echo e(url('/storage/profile_images/'.auth()->user()->picture)); ?>" class="img-circle" alt="User Image">
          <?php endif; ?>
        </div>
        <div class="pull-left info">
          <p><?php echo e(auth()->user()->name); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> En ligne</a>
        </div>
      </div>

      <?php echo $__env->make('inc.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">

<!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Dépôt
          <small>PE / <?php echo e($deposit->id); ?></small>
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
    <section class="invoice">
      <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-9">
                <img src="<?php echo e(asset('/public/website/images/z.png')); ?>" alt="Image du logo" width="30%">
            </div>
            <div class="col-md-3">
                <h3 class="text-center"><b><?php echo e($deposit->user()->agency()->pressing()->name); ?></b></h3>
                <h5 class="text-center" style="font-style: italic;"><?php echo e($deposit->user()->agency()->name); ?></h5>
                <h5 class="text-center"><?php echo e($deposit->user()->address); ?></h5>
                <h5 class="text-center" style="font-style: italic;">Tel : <?php echo e($deposit->user()->agency()->contact); ?></h5>

            </div>
        </div>
        <div class="row invoice-info">
        <br/><br/><br/>
      </div>
      <div class="row">
        <!-- accepted payments column -->
        <h3 class="text-center" style="margin-top: -15px; margin-bottom: 25px;"><b>RECU N° :</b> PE/<?php echo e($deposit->id); ?>

        </h3>
        <div class="col-xs-8">
          <p><b>Receptionniste :</b> <?php echo e($deposit->user()->fullname); ?></p>
            <p><b>Nom du client :</b> <?php echo e($deposit->client()->fullname); ?></p>
        </div>


        <div class="col-xs-4">
          <p><b>Date et heure service :</b> <?php echo e($deposit->deposit_date->format("d/m/y h:m:s")); ?></p>
          <p><b>Date et heure de retrait :</b> <?php echo e($deposit->retrieve_date->format("d/m/y h:m:s")); ?> <a data-toggle="modal" data-target="#modal-default"><i class="fa fa-pencil no-print"></i></a></p>
        </div>
      </div>
      <br/>
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table">
            <thead>
              <tr>
                  <th><label>Désignation</label></th>
                  <th><label>Quantité</label></th>
                  <th><label>Description</label></th>
                  <th><label>Prix Unitaire</label></th>
                  <th><label>Montant</label></th>
                  <th><label>Action à effectuer</label></th>
                  <th><label>Rendu</label></th>
              </tr>
            </thead>

          <tbody>
            <?php $__currentLoopData = $deposit_units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $depot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <?php echo e($depot->article()->name); ?>

                </td>

                <td>
                    <?php echo e($depot->quantity); ?>

                </td>

                <td style="width: 20px; word-wrap: break-word;">
                    <?php echo e($depot->designation); ?>

                </td>

                <td>
                    <?php if($depot->type_action == 0): ?>
                        <?php echo e($depot->article()->classic_price); ?>

                    <?php endif; ?>

                    <?php if($depot->type_action == 1): ?>
                        <?php echo e($depot->article()->repass_price); ?>

                    <?php endif; ?>

                    <?php if($depot->type_action == 2): ?>
                        <?php echo e($depot->article()->express_price); ?>

                    <?php endif; ?>
                </td>

                <td>
                    <?php if($depot->type_action == 0): ?>
                        <?php echo e($depot->article()->classic_price * $depot->quantity); ?>

                    <?php endif; ?>

                    <?php if($depot->type_action == 1): ?>
                        <?php echo e($depot->article()->repass_price * $depot->quantity); ?>

                    <?php endif; ?>

                    <?php if($depot->type_action == 2): ?>
                        <?php echo e($depot->article()->express_price * $depot->quantity); ?>

                    <?php endif; ?>
                </td>

                <td>
                    <?php if($depot->type_action == 0): ?>
                        Nettoyage classique
                    <?php endif; ?>

                    <?php if($depot->type_action == 1): ?>
                        Repassage
                    <?php endif; ?>

                    <?php if($depot->type_action == 2): ?>
                        Nettoyage Express
                    <?php endif; ?>
                </td>

                <td>
                    <?php if($depot->render == 0): ?>
                        Cintre
                    <?php endif; ?>

                    <?php if($depot->render == 1): ?>
                        Plié(e)
                    <?php endif; ?>
                </td>



            </tr>


            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </tbody>
              <tfooter>
                  <tr>
                      <td style="border: none;"></td>
                      <td style="border: none;"></td>
                      <td style="border: none;"></td>
                      <td style="border: none;"></td>
                      <td style="border: none;"></td>
                      <td><b>Montant total:</b></td>
                      <td><?php echo e($deposit->total); ?> FCFA</td>
                  </tr>
                  <tr>
                      <td style="border: none;"></td>
                      <td style="border: none;"></td>
                      <td style="border: none;"></td>
                      <td style="border: none;"></td>
                      <td style="border: none;"></td>
                      <td><b>Remise:</b></td>
                      <td><?php echo e($deposit->discount); ?> FCFA</td>
                  </tr>
                  <tr>
                      <td style="border: none;"></td>
                      <td style="border: none;"></td>
                      <td style="border: none;"></td>
                      <td style="border: none;"></td>
                      <td style="border: none;"></td>
                      <td><b>Net à payer:</b></td>
                      <td><?php echo e($deposit->total); ?> FCFA</td>
                  </tr>
                  <tr>
                      <td style="border: none;"></td>
                      <td style="border: none;"></td>
                      <td style="border: none;"></td>
                      <td style="border: none;"></td>
                      <td style="border: none;"></td>
                      <td><b>Avance:</b></td>
                      <td><?php echo e($deposit->advanced); ?> FCFA</td>
                  </tr>
                  <tr>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <?php if($deposit->total - $deposit->advanced - $deposit->discount > 0): ?>
                    <td><b>Reste à payer:</b></td>
                    <?php else: ?>
                    <td><b>Relicat:</b></td>
                    <?php endif; ?>
                    <td><?php echo e(abs($deposit->total - $deposit->advanced- $deposit->discount)); ?> FCFA</td>
                </tr>
                <tr>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td><b>Transaction/Date :</b></td>
                    <td>
                        <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($trans->amount); ?> FCFA / <?php echo e($trans->transaction_date); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                </tr>
              </tfooter>

          </table>

        </div>
      </div>
        <div class="row">
            <div class="col-md-4" style="margin-top: -15%; font-size: 16px; font-style: italic">
                <b>POCHES FOUILLEES ET VOUS APPROUVEZ</b>
            </div>
        </div>


        <div class="row text-center">
            <div class="text-center" style="margin-top: 10px; font-family: georgia,serif; color:black; font-size:22px; padding: 10%;">
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
                    <form method="POST" action="<?php echo e(route('postdatelivraison')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" name="deposit_id" class="form-control" value="<?php echo e($deposit->id); ?>" />

                                <input type="datetime" name="date_retrait" id="date" value="<?php echo e($deposit->retrieve_date); ?>" onchange="setCorrect(this,'date');" class="form-control" />
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
          <a href="<?php echo e(route('ticket_casheer', $deposit->id)); ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Format ticket de caisser</a>
          <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'manager')): ?>
          <a href="" class="btn btn-success pull-right"><i class="fa fa-cart-arrow-down"></i> Liste Des Dépôts</a>
          <?php endif; ?>
          
            <i class="fa fa-download"></i> Génerer PDF
            <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-primary pull-right">
            <i class="fa fa-dashboard"></i> Accueil</a>
        </div>
      </div>
    </section>
  </div>

  <button class="material-scrolltop bg-olive" type="button"></button>


<!-- jQuery 3 -->
<script src="<?php echo e(asset('/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo e(asset('/bower_components/jquery-ui/jquery-ui.min.js')); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo e(asset('/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<!-- Material Design -->
<script src="<?php echo e(asset('/dist/js/material.min.js')); ?>"></script>
<script src="<?php echo e(asset('/dist/js/ripples.min.js')); ?>"></script>
<script>
    $.material.init();
</script>
<!-- material-scrolltop plugin -->
<script src="<?php echo e(asset('/bower_components/material-scrolltop-master/src/material-scrolltop.js ')); ?>"></script>

<!-- Initialize material-scrolltop with (minimal) -->
<script>
    $('body').materialScrollTop();
</script>
<!-- DataTables -->
<script src="<?php echo e(asset('/bower_components/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>

<!-- page script -->
<script type="text/javascript">
  $(function () {
    $('#example1').DataTable({
      "order" : [[0, "desc"]]
    })
  })
</script>
<!-- Sparkline -->
<script src="<?php echo e(asset('/public/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')); ?>"></script>
<!-- jvectormap -->
<script src="<?php echo e(asset('/public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')); ?>"></script>
<script src="<?php echo e(asset('/public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo e(asset('/public/bower_components/jquery-knob/dist/jquery.knob.min.js')); ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo e(asset('/public/bower_components/moment/min/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('/public/bower_components/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
<!-- datepicker -->
<script src="<?php echo e(asset('/public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo e(asset('/public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')); ?>"></script>
<!-- Slimscroll -->
<script src="<?php echo e(asset('/public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')); ?>"></script>
<!-- FastClick -->
<script src="<?php echo e(asset('/public/bower_components/fastclick/lib/fastclick.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('/public/dist/js/adminlte.min.js')); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('/public/dist/js/demo.js')); ?>"></script>




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
<?php /**PATH /home/sparqrqm/public_html/testing/resources/views/deposits/show_deposit.blade.php ENDPATH**/ ?>