<?php $__env->startSection('title', '| Résultats des dépôts'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-cart-arrow-down"></i> Résultats des retraits
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-cart-arrow-down"></i> Résultats des retraits </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Résultats des retraits</h3>
                        <a href="<?php echo e(route('checkcustomer')); ?>" class="btn bg-olive pull-right no-print">Faire dépôt</a>
                        <a href="#" class="btn btn-default pull-right no-print">Liste des retraits</a>

                    </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Code Dépôt</th>
                                        <th>Date de Dépôt</th>
                                        <th>Date de Retrait</th>
                                        <th>Date de clotûre</th>
                                        <th>Transaction(s)</th>
                                        <th>Total net</th>
                                        <th>Remise</th>
                                        <th>Client</th>
                                        <!--<th>Operations</th>-->
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>PE / <?php echo e($deposit->id); ?></td>
                                            <td><?php echo e($deposit->deposit_date->format('d/m/Y ')); ?></td>
                                            <td><?php echo e($deposit->retrieve_date->format('d/m/Y ')); ?></td>
                                            <td><?php echo e($deposit->instant_retrieve); ?></td>
                                            <td>
                                                <?php $__currentLoopData = $deposit->transaction_list(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li> <?php echo e($transaction->amount); ?> / <?php echo e($transaction->transaction_date); ?> </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                            <td><?php echo e($deposit->total); ?></td>
                                            <td><?php echo e($deposit->discount); ?></td>
                                            <td><?php echo e($deposit->client()->fullname); ?></td>

                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot>

                                    <tr>
                                        <!--<td style="border: none;"></td>
                                        <td style="border: none;"></td>
                                        <td style="border: none;"></td>
                                        <td style="border: none;"></td>
                                        <td style="border: none;"></td>-->
                                        <td colspan="5" style="text-align: right;"><h4><b>TOTAUX MONTANTS</b></h4></td>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/retrieves/index.blade.php ENDPATH**/ ?>