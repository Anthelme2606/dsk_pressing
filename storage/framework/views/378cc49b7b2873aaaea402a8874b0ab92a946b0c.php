<?php $__env->startSection('title', '| Recettes'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-money"></i> Recettes
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-money"></i> Recettes </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Recettes Globales de la Journée</h3>
                    </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Code Dépôt</th>
                                        <th>Date de Dépôt</th>
                                        <th>Montant versé</th>
                                        <th>Client</th>
                                        <th class="no-print">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>PE / <?php echo e($deposit->id); ?></td>
                                            <td><?php echo e($deposit->deposit_date->format('d/m/Y h:m:s')); ?></td>
                                            <?php
                                                $day = now()->format('Y-m-d');
                                            ?>
                                            <td><?php echo e($deposit->day_transaction($day)); ?></td>
                                            <td><?php echo e($deposit->client()->fullname); ?></td>
                                            <td class="no-print">
                                            <a href="<?php echo e(route('show_deposit', $deposit->id)); ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Voir</a>
                                            
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot>

                                    <tr>
                                        <td colspan="3" style="text-align: right;"><h4><b>TOTAL RECU :</b></h4></td>
                                        <td><h4 style="color: green;"><b><?php echo e($total); ?> F.CFA</b></h4></td>
                                    </tr>

                                </tfoot>

                            </table>
                        </div>

                        <div class="box-footer no-print">
                            <a class="btn btn-default" type = "button" onclick = "window.print()"><i class="fa fa-print" ></i> Imprimer</a>
                            <a href="<?php echo e(route('checkcustomer')); ?>" class="btn bg-olive pull-right">Faire un Dépôt</a>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/receipts/receipeAllToDay.blade.php ENDPATH**/ ?>