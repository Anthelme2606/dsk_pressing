<?php $__env->startSection('title', '| Ajouter Agence'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-plus-square'></i> Ajouter Agence
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-plus-square'></i> Ajouter Agence</li>
      </ol>
    </section>

<!-- Main content -->
          <section class="content">
            <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class='col-lg-6 col-lg-offset-2'>
                  <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title"><i class='fa fa-plus-square'></i> Ajouter Agence</h3>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->
                      <form action="<?php echo e(route('agences.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="box-body">

                                <div class="col-xs-12">
                                <div class="form-group">
                                    <label >Nom de l'agence <span style="color: red;">*</span></label>
                                    <input type="text" id="title" class="form-control" name="name" required/>
                                </div>
                                </div>

                                <div class="col-xs-12">
                                    <div class="form-group">
                                    <label>Adresse de l'agence <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="address" required/>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                <div class="form-group">
                                        <label>Contact de l'agence <span style="color: red;">*</span></label>
                                        <input id="phone" type="tel" name="phone" class="form-control" required/>
                                </div>
                                <div class="form-group">
                                    <label>Pays de l'agence <span style="color: red;">*</span></label>
                                    <select name="country_id" class="form-control" required>
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                
                                <input type="hidden" name="pressing_id" value="<?php echo e(auth()->user()->agency()->pressing_id); ?>">

                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button class="btn bg-olive btn-block" type="submit">Ajouter</button>
                        </div>
                  </form>
                </div>
                <!-- /.box -->
            </div>
          </section>
          <!-- /.content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/agences/create.blade.php ENDPATH**/ ?>