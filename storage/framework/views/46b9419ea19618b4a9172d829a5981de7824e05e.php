<?php $__env->startSection('title', '| Ajouter Heure de retrait'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-plus-square'></i> Ajouter Heure de retrait
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-plus-square'></i> Ajouter Heure de retrait</li>
      </ol>
    </section>

<!-- Main content -->
          <section class="content">
            <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class='col-lg-8 col-lg-offset-2'>
                  <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title"><i class='fa fa-plus-square'></i> Ajouter Heure de retrait</h3>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->
                      <form action="<?php echo e(route('deliveryhours.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                      <div class="box-body">


                            <div class="col-md-12">
                              <div class="col-xs-4">
                                <div class="form-group">
                                  <label for="lavage_hour">Durée de Lavage simple (Heure)</label>
                                  <input type="number" class="form-control" name="lavage_hour"/>
                                </div>
                              </div>

                            <div class="col-xs-4">
                              <div class="form-group">
                                <label for="repassage_hour">Durée de repassage (Heure)</label>
                                <input type="number" name="repassage_hour" class="form-control">
                              <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="express_hour">Durée de nettoyage Express (Heure)</label>
                                    <input type="number" name="express_hour" class="form-control">
                                </div>
                              </div>
                          </div>

                      </div>
                      <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn bg-olive btn-block">Ajouter</button>
                    </div>
                </form>
                </div>
                <!-- /.box -->
            </div>
          </section>
          <!-- /.content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/deliveryhours/create.blade.php ENDPATH**/ ?>