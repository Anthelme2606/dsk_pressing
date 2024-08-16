<?php $__env->startSection('title', '| Editer Entrée/Sortie'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-plus-square'></i> Editer Entrée/Sortie
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-plus-square'></i> Editer Entrée/Sortie</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">
      <div class='col-md-8 col-md-offset-2'>
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class='fa fa-plus-square'></i> Editer Entrée/Sortie</h3>
                </div>
                <!-- /.box-header -->

            <form action="<?php echo e(route('in_out.update', $in_out->id)); ?>" method="POST">
                <?php echo method_field("PATCH"); ?>
                <?php echo csrf_field(); ?>
                <div class="box-body">

                  <div class="col-xs-12">
                  <div class="form-group">
                      <label>Libellé</label>
                      <input type="text" id="title" class="form-control" name="libelle" value="<?php echo e($in_out->libelle); ?>"/>
                  </div>
                  </div>

                  <div class="col-xs-12">
                      <div class="form-group">
                      <label>Montant</label>
                      <input type="number" class="form-control" name="montant" value="<?php echo e($in_out->montant); ?>"/>
                      </div>
                  </div>

                  <div class="col-xs-12">
                    <div class="form-group">
                    <label>Type</label>
                    <select name="type" id="type">
                        <option value="in">Entrée</option>
                        <option value="out">Sortie</option>
                    </select>
                    </div>
                </div>

                  <div class="col-xs-12">
                    <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="action_date" value="<?php echo e($in_out->action_date); ?>"/>
                    </div>
                </div>

              </div>
          </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button class="btn bg-olive btn-block" type="submit">Editer</button>
                </div>
          </form>
          </div>
          <!-- /.box -->
      </div>
    </section>
    <!-- /.content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/in_out/edit.blade.php ENDPATH**/ ?>