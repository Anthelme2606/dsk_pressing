<?php $__env->startSection('title', '| Ajouter Etat'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-plus-square'></i> Ajouter Etat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-plus-square'></i> Ajouter Etat</li>
      </ol>
    </section>

<!-- Main content -->
          <section class="content">
            <div class='col-lg-4 col-lg-offset-4'>
                  <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title"><i class='fa fa-plus-square'></i> Ajouter Etat</h3>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->
                    <form action="<?php echo e(route('status.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="box-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Titre <span style="color: red;">*</span></label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                        </div>
                        </div>

                        <div class="box-footer">
                            <button class="btn bg-olive btn-block">Ajouter</button>
                        </div>
                    </form>

                </div>
                <!-- /.box -->
            </div>
          </section>
          <!-- /.content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/status/create.blade.php ENDPATH**/ ?>