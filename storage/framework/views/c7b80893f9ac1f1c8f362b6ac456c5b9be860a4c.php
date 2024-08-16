<?php $__env->startSection('title', '| Editer Groupe de Fidélisation'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-plus-square'></i> Groupes de Fidélisation
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-plus-square'></i> Groupes de Fidélisation</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">
      <div class='col-md-6 col-md-offset-3'>
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class='fa fa-plus-square'></i> Editer Groupe de Fidélisation</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo e(route('loyalgroups.update', $loyalgroup->id)); ?>" class="form-horizontal form-box remove-margin" method="POST" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('PATCH'); ?>
                <div class="box-body">

                    <div class="col-md-12">
                        <div class="form-group">
                          <label>Nom du Groupe</label>
                          <input type="text" name="title" class="form-control", value="<?php echo e($loyalgroup->title); ?>"/>
                 
                        </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Taux de remise (%)</label>
                        <input type="number" name="rate" class="form-control", value="<?php echo e($loyalgroup->rate); ?>"/>
                      </div>
                  </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Description du Groupe</label>
                        <input type="text" name="description" class="form-control" value="<?php echo e($loyalgroup->description); ?>"/>
                      </div>
                  </div>

                  </div>
                <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn bg-olive btn-block">Editer</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
      </div>
    </section>
    <!-- /.content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/loyalgroups/edit.blade.php ENDPATH**/ ?>