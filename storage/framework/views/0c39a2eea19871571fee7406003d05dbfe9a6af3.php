<?php $__env->startSection('title', '| Dépôts'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-cart-arrow-down"></i> Dépôts
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-cart-arrow-down"></i> Dépôts classés</li>
  </ol>
</section>


    <!-- Main content -->
    <section class="content">
        <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h5 class="box-title">Liste des dépôts classés</h5>
                        
                        

                    </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="display: none;">ID</th>
                                        <th style="width: 10%">Code</th>
                                        <th style="width: 15%">Client</th>
                                        <th>Date dépôt</th>
                                        <th style="width: 15%">Date de retrait prévu</th>
                                        <th>Nombre d'articles</th>
                                        <th>Opérations</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td style="display: none;"><?php echo e($deposit->id); ?></td>
                                            <td style="width: 10%"><?php echo e($deposit->code); ?></td>
                                            <td style="width: 15%"><?php echo e($deposit->client()->fullname); ?></td>
                                            <td><?php echo e($deposit->created_at); ?></td>
                                            <td style="width: 15%"><?php echo e($deposit->retrieve_date); ?></td>
                                            <td><?php echo e($deposit->article_qte()); ?></td>
                                            <td>

                                                <a href="<?php echo e(route('deposits.show', $deposit->id)); ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Voir</a>

                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>

                            </table>
                        </div>

                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/traitements/list_deposits_classed.blade.php ENDPATH**/ ?>