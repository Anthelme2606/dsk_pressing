<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Clients Inscrits
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Clients Inscrits</li>
      </ol>
    </section>

    <div class="pad margin no-print">
      <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Note:</h4>
        Dans le cas où un client ne se trouverait pas dans cette liste, vous devez d'abord l'inscrire avant de procéder au Dépôt d'articles
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title"><i class='fa fa-folder'></i> Liste des Clients Inscrits</h3>
                    <a href="<?php echo e(route('clients.create')); ?>" class="btn bg-olive pull-right"><i class="fa fa-plus"></i> Ajouter Client</a>
                </div>

                    <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nom et Prénoms</th>
                                        <th>Email</th>
                                        <th>Téléphone</th>
                                        <th>Operations</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>

                                        <td><?php echo e($customer->fullname); ?></td>
                                        <td><?php echo e($customer->email); ?> </td>
                                        <td><?php echo e($customer->phone_number); ?> </td>
                                        <td>
                                            <a href="<?php echo e(route('create_deposit', $customer->id)); ?>" class="btn btn-info btn-xs pull-left" style="margin-right: 3px;"><i class="fa fa-cart-arrow-down"></i> Faire un Dépôt</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>

                            </table>
                        </div>

                        <div class="box-footer">
                          <a href="<?php echo e(route('clients.create')); ?>" class="btn bg-olive"><i class="fa fa-plus"></i> Ajouter Client</a>
                        </div>
                </div>

             </section>

    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/customer.blade.php ENDPATH**/ ?>