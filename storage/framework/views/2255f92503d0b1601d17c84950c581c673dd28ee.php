<?php $__env->startSection('title', '| Ajouter Suffixe Code'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-plus-square'></i> Ajouter Suffixe Code
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-plus-square'></i> Ajouter Suffixe Code</li>
      </ol>
    </section>

<!-- Main content -->
          <section class="content">
            <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class='col-lg-8 col-lg-offset-2'>
                  <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title"><i class='fa fa-plus-square'></i> Ajouter Suffixe Code</h3>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->
                      <form action="<?php echo e(route('codesuffixes.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                      <div class="box-body">

                            <div class="col-xs-6">
                              <div class="form-group">
                                <label for="title">Suffixe Code</label>
                                <input type="text" class="form-control" name="title">
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/codesuffixes/create.blade.php ENDPATH**/ ?>