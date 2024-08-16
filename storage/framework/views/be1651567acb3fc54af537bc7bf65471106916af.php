<?php $__env->startSection('title', '| Ajouter Groupe de Fidélisation'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>
        <i class='fa fa-plus-square'></i> Groupe de Fidélisation
      </h4>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-plus-square'></i> Groupe de Fidélisation</li>
      </ol>
    </section>

<!-- Main content -->
          <section class="content">
            <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class='col-lg-6 col-lg-offset-3'>
                  <div class="box box-primary">
                      <div class="box-header with-border">
                        <h4 class="box-tite"><b> Ajouter un groupe de Fidélisation</b></h4>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->

                      <form action="<?php echo e(route('loyalgroups.store')); ?>" class="form-horizontal form-box remove-margin" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                      
                      <div class="box-body">
                        
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label>Nom du Groupe <span style="color: red;">*</span></label>
                                  <input type="text" name="title" class="form-control" required/>
                                
                              </div>
                            </div>

                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Taux de Remise (%) <span style="color: red;">*</span></label>
                                <input type="number" name="rate" min="0" class="form-control" required/>
                                  
                              </div>
                          </div>

                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="description" min="0" class="form-control"/>
                                  
                              </div>
                          </div>
                      </div>
                      <!-- /.box-body -->

                    <div class="box-footer">
                      <button type="submit" class="btn btn-block bg-olive" style="border-radius: 5px;">Ajouter</button>
                      
                    </div>
                  
                </div>
                <!-- /.box -->
            </div>
          </section>
          <!-- /.content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/loyalgroups/create.blade.php ENDPATH**/ ?>