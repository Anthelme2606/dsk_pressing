<?php $__env->startSection('title', '| Retraits'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<br><section class="content-header">
  <h1 style="color: rgb(58, 85, 77);">
    <i class="fa fa-suitcase"></i> Mes retraits
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-suitcase"></i> Mes retraits </li>
  </ol>
</section>


    <!-- Main content -->
    <section class="content">
      <section class="content">
        <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
          <div class="col-md-12">
              <div class="box box-solid">
                  <div class="box-header with-border">
                      <h4 class="box-tite"><b> Liste de mes retraits</b></h4>
                      
                      
                      
                  </div>
                  <!-- /.box-header -->
                    <div class="table-responsive">
                      <div class="box-body">
                          <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                    <th>N°</th>
                                    <th>Code</th>
                                    <th>Réceptionniste</th>
                                    <th>Date de dépôt</th>
                                    <th>Montant total</th>
                                    <th>Remise</th>
                                  </tr>
                              </thead>

                              <tbody>
                                  <?php $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <tr>

                                      <td><?php echo e($deposit->id); ?></td>
                                      <td><?php echo e($deposit->code); ?></td>
                                      <td><?php echo e($deposit->user()->fullname); ?></td>
                                      <td><?php echo e($deposit->deposit_date->format('d/m/Y à H:i')); ?></td>
                                      <td><?php echo e($deposit->total); ?></td>
                                      <td><?php echo e($deposit->discount); ?></td>
                                      
                                      <td>
                                      

                                      </td>
                                  </tr>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tbody>

                          </table>
                      </div>
                    </div>
<div class="box-footer">
                    <a onclick="history.back()" class="btn bg-olive" style="border-radius: 5px;">Retour</a>
                    </div>
              </div>
          </div>
      </div>

        

    </section>

    </section>
    <!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('deposit'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/clientSpace/myDeliveries.blade.php ENDPATH**/ ?>