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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo e(asset('public/dist/css/skins/all-md-skins.min.css')); ?>">
  <!-- DataTables -->
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo e(asset('public/bower_components/morris.js/morris.css')); ?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo e(asset('public/bower_components/jvectormap/jquery-jvectormap.css')); ?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo e(asset('public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')); ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo e(asset('public/bower_components/bootstrap-daterangepicker/daterangepicker.css')); ?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo e(asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')); ?>">
  <!-- Material ScrollTop stylesheet -->
  <link rel="stylesheet" href="<?php echo e(asset('public/bower_components/material-scrolltop-master/src/material-scrolltop.css')); ?>">

  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>-->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
    @media  print{
        @page  {
            overflow: hidden;
        }
        ::-webkit-scrollbar {
            display: none;
        }
    }
</style>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"/>
</head>

<body class="hold-transition skin-green sidebar-mini" >
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
                  <img src="<?php echo e(asset('public/avatar.jpeg')); ?>" class="img-circle" alt="User Image">
                <?php else: ?>
                  <img src="<?php echo e(url('public/storage/profile_images/'.auth()->user()->picture)); ?>" class="img-circle" alt="User Image">
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

        <div class="content-wrapper" >


          <section class="content-header" >
              <h1>
                Dépôt
                <small>PE-<?php echo e($deposit->agence()); ?> / <?php echo e($deposit->id); ?></small>
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

          <section class="invoice text-center" style="padding-left: 5px; padding-right: 5px;">

            <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="row invoice-info">
                <br/><br/><br/>
            </div>
            <?php
                $type_depot = "";
            ?>

            <div class="row">
              <div style="text-align: center"><img src="<?php echo e(asset('public/website/images/z.png')); ?>" alt="Image du logo" width="40%" style="padding-top: -5%;" ></div>
              <h3 class="text-center"><b>BON DE SORTIE</b></h3>
              <h6 class="text-center"><b><?php echo e($deposit->user()->agency()->name); ?></b></h6>
                <?php if(env('IS_TEST') == true): ?>
                    <h3><b>TEST</b></h3>
                  <?php endif; ?>
                <h4 class="text-center" style="font-style: italic;"><?php echo e(env('BY_WHO', 'By INNOV 720')); ?></h4>
                <h5 class="text-center"><?php echo e(env('ADRESSE_LOCAL', 'PRESING ELEGANCE')); ?></h5>
                <h5 class="text-center" style=" margin-bottom: 12px; font-style: italic;"><?php echo e(env('APP_RCCM', '')); ?></h5>

                <h5 class="text-center" style="font-style: italic;"><b>PE-<?php echo e($deposit->agence()); ?>/<?php echo e($deposit->id); ?></b> | <b>Client :</b><?php echo e($deposit->client()->fullname); ?></h4>

                    <h6 class="text-center">Caissier(ère) : <b><?php echo e($deposit->user()->fullname); ?></b></h6>
                <p style="text-align: center; font-size: 12px;">Date de réception :  <?php echo e($deposit->deposit_date->format("d/m/y")); ?>  | Date de retrait : <b> <?php echo e($deposit->retrieve_date->timezone('Europe/Brussels')->format("d/m/y h:i:s")); ?> </b><a href="javascript:;" data-toggle="modal" data-target="#editHour"><i class="fa fa-pencil no-print"></i></a> </p>

                <p>Traitement : <b>
                  <?php
                      if(count($depositedarticles)>0){
                          if($depositedarticles[0]->type_action == 0){
                              $type_depot = "Nettoyage classique";
                          } else if($depositedarticles[0]->type_action == 2){
                              $type_depot = "Repassage";
                          } else if($depositedarticles[0]->type_action == 1){
                              $type_depot = "Nettoyage express";
                          }
                      }
                  ?>
                  <?php echo e($type_depot); ?>

              </b></p>
            </div>

            <br/>

        <div class="row">
            <div class="table-responsive">
                <table class="table">
                    <?php
                        $nbr_articles = 0;
                    ?>
                    <thead>
                        <td><b>Qté x Désignation</b></td>
                        <td><b>PU (FCFA)</b></td>
                        <td><b>Total (FCFA)</b></td>
                    </thead>

                    <tbody>
                        <?php $__currentLoopData = $depositedarticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $depot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $nbr_articles += $depot->quantity;
                        ?>
                        <tr>
                            <td style="font-size: 12px;">
                              <?php echo e($depot->quantity); ?> x <?php echo e($depot->article()->name); ?>

                            </td>
                            <td style="font-size: 12px;">

                                <?php if($depot->type_action == 0): ?>
                                    <?php echo e($depot->article()->classic_price); ?>

                                <?php endif; ?>

                                <?php if($depot->type_action == 2): ?>
                                    <?php echo e($depot->article()->repass_price); ?>

                                <?php endif; ?>

                                <?php if($depot->type_action == 1): ?>
                                    <?php echo e($depot->article()->express_price); ?>

                                <?php endif; ?>
                            </td>

                            <td style="font-size: 12px;">
                                <?php if($depot->type_action == 0): ?>
                                    <?php echo e($depot->article()->classic_price * $depot->quantity); ?>

                                <?php endif; ?>

                                <?php if($depot->type_action == 2): ?>
                                    <?php echo e($depot->article()->repass_price * $depot->quantity); ?>

                                <?php endif; ?>

                                <?php if($depot->type_action == 1): ?>
                                    <?php echo e($depot->article()->express_price * $depot->quantity); ?>

                                <?php endif; ?>
                            </td>


                        </tr>


                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>

                    <tfoot class="text-center">
                        <tr >
                            <td style="font-size: 12px;"><b>Montant total:</b></td>
                            <td></td>
                            <td style="position: absolute; float:right; font-size: 12px;"><?php echo e($deposit->total); ?></td>
                        </tr>

                        <tr>
                            <td style="font-size: 12px;"><b>Remise:</b></td>
                            <td></td>
                            <td style="position: absolute; float:right; font-size: 12px;"><?php echo e($deposit->discount); ?></td>
                        </tr>

                        <tr style="">
                            <td style="font-size: 12px;"><b>Total à payer:</b></td>
                            <td></td>
                            <td style="position: absolute; float:right; font-size: 12px;"><?php echo e($deposit->total - $deposit->discount); ?></td>
                        </tr>

                        <tr>
                            <td style="font-size: 12px;"><b>Avance:</b></td>
                            <td></td>
                            <td style="position: absolute; float:right; font-size: 12px;"><?php echo e($deposit->advanced); ?></td>
                        </tr>

                        <tr>
                            <?php if($deposit->total - $deposit->advanced - $deposit->discount > 0): ?>
                                <td style="font-size: 12px;"><b>Reste à payer:</b></td>
                                <td></td>

                                <td style="position: absolute; float:right; font-size: 12px;"><?php echo e(abs($deposit->total - $deposit->advanced - $deposit->discount )); ?></td>
                            <?php else: ?>
                                <td style="font-size: 12px;"><b>Relicat:</b></td>
                                <td></td>
                                <td style="position: absolute; float:right; font-size: 12px;"><?php echo e(abs($deposit->total - $deposit->advanced - $deposit->discount)); ?></td>
                            <?php endif; ?>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>


        <div class="text-center">
            <h2>
                <b><?php echo e($nbr_articles); ?></b>
            </h2>
            <h4 style="margin-bottom: -5px; ">Pièce(s)</h4>
        </div>

        <style>
          hr {
              border: none;
              border-top: 4px dotted black;
              color: #fff;
              background-color: #fff;
              height: 4px;
              width: 100%;
              padding-top: 10px;
              padding-bottom: 2px;
          }
        </style>






      <div class="row text-center" style="margin-top: -5px;">
          <div class="text-center" style="font-family: georgia,serif; color:black; font-size: 11px; padding-top: 5px;">
              <em style="color: rgb(212, 205, 100);">PRESSING ELEGANCE</em> vous remercie pour votre confiance
          </div>
      </div>

       <div class="row text-center" style="margin-top: -5px;">
            <div class="text-center" style="font-family: georgia,serif; color:black; font-size: 11px; padding-top: 5px;">
                <em style="color: rgb(212, 205, 100);">PRESSING ELEGANCE</em> vous remercie pour votre confiance
            </div>
        </div>

         <div class="row text-center">
          <div class="text-center" style="font-family: georgia,serif; color:black; font-size: 10px; padding-left:5px; padding-right: 5px;">
            Les réclamations ne sont recevables que dans un délai de 72H.
          </div>
        </div>
        <div class="row text-center">
          <div class="text-center" style="font-family: georgia,serif; color:black; font-size: 10px; padding-left:5px; padding-right: 5px;">
            Le client reconnaît avoir pris connaissance des conditions générales de vente affichées en boutique. Et du barème d'indemnisation.                       Dépassé 15 jours,  le vêtement sera considéré comme admis en garde à titre onéreux. Passé ce délai de 3 mois, la maison n'est plus responsable des vêtements confiés.
          </div>
        </div>
        <div class="row text-center">
            <div class="text-center" style="font-family: georgia,serif; color:black; font-size: 10px; padding-left:5px; padding-right: 5px;">
                Nous vous remercions de votre visite et à bientôt.
            </div>
        </div>

        <div class="row text-center">
            <a href="#" target="blank" class="text-center" style="font-family: georgia,serif; color:black; font-size: 11px;">
                <em style="color: rgb(212, 205, 100);">www.pressingelegance.com</em>
            </a>
        </div>

        <hr/>
        <hr/>

          <section class="invoice text-center" style="padding-left: 5px; padding-right: 5px;">

              <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

              <div class="row invoice-info">
                  <br/><br/><br/>
              </div>
              <?php
                  $type_depot = "";
              ?>

              <div class="row">
                <div style="text-align: center"><img src="<?php echo e(asset('public/website/images/z.png')); ?>" alt="Image du logo" width="40%" style="padding-top: -5%;" ></div>
                  <h6 class="text-center"><b><?php echo e($deposit->user()->agency()->name); ?></b></h6>
                  <h4 class="text-center" style="font-style: italic;"><?php echo e(env('BY_WHO', 'By INNOV 720')); ?></h4>
                  <?php if(env('IS_TEST') == true): ?>
                    <h3><b>TEST</b></h3>
                  <?php endif; ?>
                  <h5 class="text-center"><?php echo e(env('ADRESSE_LOCAL', 'PRESING ELEGANCE')); ?></h5>
                  <h5 class="text-center" style=" margin-bottom: 12px; font-style: italic;"><?php echo e(env('APP_RCCM', '')); ?></h5>

                  <h5 class="text-center" style="font-style: italic;"><b>PE-<?php echo e($deposit->agence()); ?>/<?php echo e($deposit->id); ?></b> | <b>Client :</b><?php echo e($deposit->client()->fullname); ?></h4>

                <h6 class="text-center">Caissier(ère) : <b><?php echo e($deposit->user()->fullname); ?></b></h6>
                  <p style="text-align: center; font-size: 12px;">Date de réception :  <?php echo e($deposit->deposit_date->format("d/m/y")); ?>  | Date de retrait : <b> <?php echo e($deposit->retrieve_date->timezone('Europe/Brussels')->format("d/m/y h:i:s")); ?> </b><a href="javascript:;" data-toggle="modal" data-target="#editHour"><i class="fa fa-pencil no-print"></i></a> </p>

                  <p>Traitement : <b>

                    <?php
                    if(count($depositedarticles)>0){
                        if($depositedarticles[0]->type_action == 0){
                            $type_depot = "Nettoyage classique";
                        } else if($depositedarticles[0]->type_action == 2){
                            $type_depot = "Repassage";
                        } else if($depositedarticles[0]->type_action == 1){
                            $type_depot = "Nettoyage express";
                        }
                    }
                ?>
                    <?php echo e($type_depot); ?>

                </b></p>
              </div>

              <br/>

          <div class="row">
              <div class="table-responsive">
                  <table class="table">
                      <?php
                          $nbr_articles = 0;
                      ?>
                      <thead>
                          <td><b>Qté x Désignation</b></td>
                          <td><b>PU (FCFA)</b></td>
                          <td><b>Total (FCFA)</b></td>
                      </thead>

                      <tbody>
                          <?php $__currentLoopData = $depositedarticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $depot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php
                              $nbr_articles += $depot->quantity;
                          ?>
                          <tr>
                              <td style="font-size: 12px;">
                                <?php echo e($depot->quantity); ?> x <?php echo e($depot->article()->name); ?>

                              </td>
                              <td style="font-size: 12px;">

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

                              <td style="font-size: 12px;">
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


                          </tr>


                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      </tbody>

                      <tfoot class="text-center">
                        <tr >
                            <td style="font-size: 12px;"><b>Montant total:</b></td>
                            <td></td>
                            <td style="position: absolute; float:right; font-size: 12px;"><?php echo e($deposit->total); ?></td>
                        </tr>

                        <tr>
                            <td style="font-size: 12px;"><b>Remise:</b></td>
                            <td></td>
                            <td style="position: absolute; float:right; font-size: 12px;"><?php echo e($deposit->discount); ?></td>
                        </tr>

                        <tr style="">
                            <td style="font-size: 12px;"><b>Total à payer:</b></td>
                            <td></td>
                            <td style="position: absolute; float:right; font-size: 12px;"><?php echo e($deposit->total - $deposit->discount); ?></td>
                        </tr>

                        <tr>
                            <td style="font-size: 12px;"><b>Avance:</b></td>
                            <td></td>
                            <td style="position: absolute; float:right; font-size: 12px;"><?php echo e($deposit->advanced); ?></td>
                        </tr>

                        <tr>
                            <?php if($deposit->total - $deposit->advanced - $deposit->discount > 0): ?>
                                <td style="font-size: 12px;"><b>Reste à payer:</b></td>
                                <td></td>

                                <td style="position: absolute; float:right; font-size: 12px;"><?php echo e(abs($deposit->total - $deposit->advanced - $deposit->discount )); ?></td>
                            <?php else: ?>
                                <td style="font-size: 12px;"><b>Relicat:</b></td>
                                <td></td>
                                <td style="position: absolute; float:right; font-size: 12px;"><?php echo e(abs($deposit->total - $deposit->advanced - $deposit->discount)); ?></td>
                            <?php endif; ?>
                        </tr>
                    </tfoot>
                  </table>
              </div>
          </div>


          <div class="text-center">
              <h2>
                  <b><?php echo e($nbr_articles); ?></b>
              </h2>
              <h4 style="margin-bottom: -5px; ">Pièce(s)</h4>
          </div>

          <style>
            hr {
                border: none;
                border-top: 4px dotted black;
                color: #fff;
                background-color: #fff;
                height: 4px;
                width: 100%;
                padding-top: 10px;
                padding-bottom: 2px;
            }
          </style>






        <div class="row text-center" style="margin-top: -5px;">
            <div class="text-center" style="font-family: georgia,serif; color:black; font-size: 11px; padding-top: 5px;">
                <em style="color: rgb(212, 205, 100);">PRESSING ELEGANCE</em> vous remercie pour votre confiance
            </div>
        </div>

         <div class="row text-center">
          <div class="text-center" style="font-family: georgia,serif; color:black; font-size: 10px; padding-left:5px; padding-right: 5px;">
            Les réclamations ne sont recevables que dans un délai de 72H.
          </div>
        </div>
        <div class="row text-center">
          <div class="text-center" style="font-family: georgia,serif; color:black; font-size: 10px; padding-left:5px; padding-right: 5px;">
            Le client reconnaît avoir pris connaissance des conditions générales de vente affichées en boutique. Et du barème d'indemnisation.                       Dépassé 15 jours,  le vêtement sera considéré comme admis en garde à titre onéreux. Passé ce délai de 3 mois, la maison n'est plus responsable des vêtements confiés.
          </div>
        </div>
        <div class="row text-center">
            <div class="text-center" style="font-family: georgia,serif; color:black; font-size: 10px; padding-left:5px; padding-right: 5px;">
                Nous vous remercions de votre visite et à bientôt.
            </div>
        </div>

          <div class="row text-center">
              <a href="#" target="blank" class="text-center" style="font-family: georgia,serif; color:black; font-size: 11px;">
                  <em style="color: rgb(212, 205, 100);">www.pressingelegance.com</em>
              </a>
          </div>

          <?php for($i=0; $i<$nbr_articles; $i++): ?>
                <div>
                    <hr/>
                    <h5 class="text-center" style="font-style: italic; font-size: 30px;"><b>PE-<?php echo e($deposit->agence()); ?>/<?php echo e($deposit->id); ?></b></h4>
                </div>
            <?php endfor; ?>
          <div class="row no-print">
              <div class="col-xs-12">
                <a onClick="window.print()" target="_blank" class="btn btn-default" id="printButton"><i class="fa fa-print"></i> Imprimer</a>
                <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'manager')): ?>
                <a href="" class="btn btn-success pull-right"><i class="fa fa-cart-arrow-down"></i> Liste Des Dépôts</a>
                <?php endif; ?>
                

              </div>
            </div>
           </div>
              <div class="modal fade" id="editHour">
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
                                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Annuler</button>
                                  <button type="submit" class="btn btn-primary">Editer</button>
                              </div>
                          </form>
                      </div>

                  </div>
                  <!-- /.modal-dialog -->




          </section>
        </div>

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a onClick="window.print()" target="_blank" class="btn btn-default" id="printButton"><i class="fa fa-print"></i> Imprimer</a>
          <a href="<?php echo e(route('ticket_casheer', $deposit->id)); ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Format ticket de caisser</a>
          <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'manager')): ?>
          <a href="" class="btn btn-success pull-right"><i class="fa fa-cart-arrow-down"></i> Liste Des Dépôts</a>
          <?php endif; ?>
          
            <i class="fa fa-download"></i> Génerer PDF
            <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-primary pull-right">
            <i class="fa fa-dashboard"></i> Accueil</a>
        </div>
      </div>




      <script src="<?php echo e(asset('public/bower_components/jquery/dist/jquery.min.js')); ?>"></script>

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
      <script src="<?php echo e(asset('public/bower_components/jquery-ui/jquery-ui.min.js')); ?>"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
        $.widget.bridge('uibutton', $.ui.button);
      </script>
      <!-- Bootstrap 3.3.7 -->
      <script src="<?php echo e(asset('public/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
      <!-- Material Design -->
      <script src="<?php echo e(asset('public/dist/js/material.min.js')); ?>"></script>
      <script src="<?php echo e(asset('public/dist/js/ripples.min.js')); ?>"></script>
      <script>
          $.material.init();
      </script>
      <!-- Morris.js charts -->
      <script src="<?php echo e(asset('public/bower_components/raphael/raphael.min.js')); ?>"></script>
      <script src="<?php echo e(asset('public/bower_components/morris.js/morris.min.js')); ?>"></script>
      <!-- material-scrolltop plugin -->
      <script src="<?php echo e(asset('public/bower_components/material-scrolltop-master/src/material-scrolltop.js ')); ?>"></script>

      <!-- Initialize material-scrolltop with (minimal) -->
      <script>
          $('body').materialScrollTop();
      </script>
      <!-- DataTables -->
      <script src="<?php echo e(asset('public/bower_components/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
      <script src="<?php echo e(asset('public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>

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
      <script src="<?php echo e(asset('public/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')); ?>"></script>
      <!-- jvectormap -->
      <script src="<?php echo e(asset('public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')); ?>"></script>
      <script src="<?php echo e(asset('public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>
      <!-- jQuery Knob Chart -->
      <script src="<?php echo e(asset('public/bower_components/jquery-knob/dist/jquery.knob.min.js')); ?>"></script>
      <!-- daterangepicker -->
      <script src="<?php echo e(asset('public/bower_components/moment/min/moment.min.js')); ?>"></script>
      <script src="<?php echo e(asset('public/bower_components/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
      <!-- datepicker -->
      <script src="<?php echo e(asset('public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
      <!-- Bootstrap WYSIHTML5 -->
      <script src="<?php echo e(asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')); ?>"></script>
      <!-- Slimscroll -->
      <script src="<?php echo e(asset('public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')); ?>"></script>
      <!-- FastClick -->
      <script src="<?php echo e(asset('public/bower_components/fastclick/lib/fastclick.js')); ?>"></script>
      <!-- AdminLTE App -->
      <script src="<?php echo e(asset('public/dist/js/adminlte.min.js')); ?>"></script>

      <?php echo $__env->yieldPushContent('rate'); ?>
      <?php echo $__env->yieldPushContent('js'); ?>
      <?php echo $__env->yieldPushContent('scriptdelivery'); ?>
      <?php echo $__env->yieldPushContent('etat'); ?>
      <?php echo $__env->yieldPushContent('capitalize'); ?>
      <?php echo $__env->yieldPushContent('script'); ?>
      <?php echo $__env->yieldPushContent('customer'); ?>
      <?php echo $__env->yieldPushContent('deposit'); ?>
      <?php echo $__env->yieldPushContent('delivery'); ?>
      <?php echo $__env->yieldPushContent('user'); ?>
      <?php echo $__env->yieldPushContent('search'); ?>
      <?php echo $__env->yieldPushContent('control'); ?>
      <?php echo $__env->yieldPushContent('getcustomer'); ?>
      <?php echo $__env->yieldPushContent('codesuffixe'); ?>
      <?php echo $__env->yieldPushContent('deliveryhour'); ?>
      <?php echo $__env->yieldPushContent('loyalgroup'); ?>
      <?php echo $__env->yieldPushContent('clientgroup'); ?>
   <script>
    $(document).ready(function() {
        $(document).on('keydown', function(event) {
            if (event.ctrlKey && (event.keyCode === 80)) {
                // Si la combinaison Ctrl + P est pressée
                event.preventDefault(); // Empêche l'action par défaut de l'impression
                logPrintAction(); // Enregistre l'action d'impression dans les logs
            }
        });

        // Gestionnaire de clic pour un bouton d'impression
        $('#printButton').on('click', function() {
            logPrintAction(); // Enregistre l'action d'impression dans les logs
        });

        function logPrintAction() {
            // Envoie une requête Ajax à Laravel pour enregistrer l'action d'impression
            $.ajax({
                url: '/log-print-action',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    deposit_id: <?php echo e($deposit->id); ?>

                },
                success: function(response) {
                    console.log('Action d\'impression enregistrée dans les logs.');
                },
                error: function(xhr, status, error) {
                    console.error('Erreur lors de l\'enregistrement de l\'action d\'impression :', error);
                }
            });
        }
    });

   </script>

</body>
</html>
<?php /**PATH /home/sparqrqm/public_html/testing/resources/views/deposits/bon.blade.php ENDPATH**/ ?>