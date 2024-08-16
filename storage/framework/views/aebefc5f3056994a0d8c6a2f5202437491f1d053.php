<?php $__env->startSection('title', '| Retraits du jour'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-suitcase"></i> Retraits du jour
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-suitcase"></i> Retraits du jour </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Résultats des retraits du jour</h3>
                        <a href="<?php echo e(route('checkcustomer')); ?>" class="btn bg-olive pull-right no-print">Faire dépôt</a>
                        <a href="#" class="btn btn-default pull-right no-print">Liste des retraits</a>

                    </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Code dépôt</th>
                                        <th>Date du dépôt</th>
                                        <th>Date effective retrait</th>
                                        <th>Total net</th>

                                        <th>Montant payé</th>
                                        <th>Nom du client</th>
                                        
                                        <th>Téléphone</th>
                                        <th>Nom du receptionniste</th>
                                        <th class="no-print">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if(count($deposits) > 0): ?>
                                        <?php $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>PE / <?php echo e($deposit->id); ?></td>
                                            <td><?php echo e($deposit->deposit_date->format('d/m/Y h:m:s')); ?></td>
                                            <td><?php echo e($deposit->instant_retrieve); ?></td>
                                            <td><?php echo e($deposit->total); ?></td>
                                            <?php
                                                $reste = $deposit->total - $deposit->advanced - $deposit->discount;
                                            ?>

                                            <td><?php echo e($deposit->transaction($date_totake)); ?></td>
                                            <td><?php echo e($deposit->client()->fullname); ?></td>
                                            <td><?php echo e($deposit->client()->phone_number); ?></td>
                                            <td><?php echo e($deposit->casheer()); ?></td>
                                        <!--<td><?php echo e($deposit->retrieve_date); ?></td>-->
                                            <td class="no-print">
                                                <a href="<?php echo e(route('deposits.show', $deposit->id)); ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Voir</a> <br/>
                                                <a href="<?php echo e(route('show_deposit', $deposit->id)); ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Voir details</a>
                                                
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <div class="col-lg-12">
                                                <div class="alert alert-danger">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span>x</span>
                                                    </button>
                                                    <span>
                                                        <strong><center>Aucun retrait trouvé!</center>  </strong> </span>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" style="text-align: right;"><h4><b>TOTAL ENCAISSEMENT DU JOUR:</b></h4></td>
                                        <td><h4 style="color: green;"><b><?php echo e($total); ?> F.CFA</b></h4></td>
                                    </tr>
                                    

                                    <tr>
                                        <td colspan="7" style="text-align: right;"><h4><b>NOMBRE D'ARTICLES :</b></h4></td>
                                        <td><h4 style="color: darkred;"><b><?php echo e($nbr_articles); ?> </b></h4></td>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/stats/answers.blade.php ENDPATH**/ ?>