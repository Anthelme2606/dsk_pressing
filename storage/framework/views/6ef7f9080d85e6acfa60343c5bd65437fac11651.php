<?php $__env->startSection('title', '| Etats des dépôts de la journée'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-cart-arrow-down"></i> Etats des dépôts de la journée
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-cart-arrow-down"></i> Etats des dépôts de la journée </li>
      </ol>

    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h5 class="box-title">Ventes de la journée</h5>
                        <a href="<?php echo e(route('checkcustomer')); ?>" class="btn bg-olive pull-right no-print">Faire dépôt</a>
                    </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <h5 align="center" class="box-title"><b>Pour le</b> : <?php echo e($date_now); ?></h5><br>
                            <h5 align="center"><b>Nombre de ligne(s) :</b> <span><?php echo e($nbre); ?></span></h5>
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Code Dépôt</th>
                                        <th>Date de Dépôt</th>
                                        <th>Date de Retrait</th>
                                        
                                        <th>Total net</th>
                                        <th>Remise</th>
                                        <th>Total à payer</th>
                                        <th>Quantité</th>
                                        <th>Avance</th>
                                        <th>Reste</th>
                                        <th>Client</th>
                                        <th>Caissier</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>PE / <?php echo e($deposit->id); ?></td>
                                            <td><?php echo e($deposit->deposit_date->format('d/m/Y ')); ?></td>
                                            <td><?php echo e($deposit->retrieve_date->format('d/m/Y ')); ?></td>

                                            <td><?php echo e($deposit->total); ?></td>
                                            <td><?php echo e($deposit->discount); ?></td>
                                            <td><?php echo e($deposit->total - $deposit->discount); ?></td>
                                            
                                            <td><?php echo e($deposit->nbr_articles()); ?></td>
                                            <td><?php echo e($deposit->advanced); ?></td>
                                            <td><?php echo e($deposit->total - $deposit->advanced - $deposit->discount); ?></td>
                                            <td><?php echo e($deposit->client()->fullname); ?></td>
                                            <td> <a href="<?php echo e(route('saleDayCasheer', ['id' => $deposit->user()->id ])); ?>"><?php echo e($deposit->user()->fullname); ?></a> </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot>

                                    <tr>
                                        <td colspan="4" style="text-align: right;"><h4><b>NOMBRE D'ARTICLES TRAITEES :</b></h4></td>
                                        <td><h4 style="color: green;"><b><?php echo e($countArticles); ?></b></h4></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="text-align: right;"><h4><b>TOTAUX REMISES :</b></h4></td>
                                        <td><h4 style="color: green;"><b><?php echo e($totalDiscount); ?> F.CFA</b></h4></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" style="text-align: right;"><h4><b>TOTAUX VENTES JOURNALIER:</b></h4></td>
                                        <td><h4 style="color: green;"><b><?php echo e($total - $totalDiscount); ?> F.CFA</b></h4></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" style="text-align: right;"><h4><b>TOTAUX AVANCES PAYEES :</b></h4></td>
                                        <td><h4 style="color: green;"><b><?php echo e($totalAdvanced); ?> F.CFA</b></h4></td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" style="text-align: right;"><h4><b>TOTAUX RESTE A PAYER :</b></h4></td>
                                        <td><h4 style="color: darkred;"><b><?php echo e($totalRest); ?> F.CFA</b></h4></td>
                                    </tr>
                                     <tr>
                                        <td colspan="8" style="text-align: right;"><h4><b>NOMBRE D'ARTICLES :</b></h4></td>
                                        <td><h4 style="color: darkred;"><b><?php echo e($nbr_articles); ?> </b></h4></td>
                                    </tr>
                                    <tr>
                                        <td colspan="9" style="text-align: right;"><h4><b>AUTRES ENTREES :</b></h4></td>
                                        <td><h4 style="color: green;"><b><?php echo e($in_price); ?> FCFA</b></h4></td>
                                    </tr>
                                    <tr>
                                        <td colspan="10" style="text-align: right;"><h4><b>AUTRES SORTIES :</b></h4></td>
                                        <td><h4 style="color: red;"><b><?php echo e($out_price); ?> FCFA</b></h4></td>
                                    </tr>
                                  </tfoot>

                            </table>
                        </div>

                        <div class="box-footer no-print">
                            <a class="btn btn-default" type = "button" onclick = "window.print()"><i class="fa fa-print" ></i> Imprimer</a>
                          <a href="<?php echo e(route('checkcustomer')); ?>" class="btn bg-olive pull-right">Faire un dépôt</a>
                        </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/stats/saleday.blade.php ENDPATH**/ ?>