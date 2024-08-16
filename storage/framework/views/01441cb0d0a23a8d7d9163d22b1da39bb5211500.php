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
      <div class='col-md-8 col-md-offset-2'>
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class='fa fa-plus-square'></i> Editer Groupe de Fidélisation</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo e(route('clientgroups.update', $clientgroup->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <div class="box-body">

                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="client_id">Nom du client</label>
                        <select name="client_id" class="form-control">
                            <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($client->id); ?>"><?php echo e($client->fullname); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                  </div>


                  <div class="col-md-12">
                    <div class="form-group">
                    <label for="group_id">Groupe de fidélisation</label>
                        <select name="group_id" class="form-control">
                            <?php $__currentLoopData = $loyalgroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loyalgroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($loyalgroup->id); ?>"><?php echo e($loyalgroup->title); ?> -- <?php echo e($loyalgroup->rate); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
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

<?php $__env->startPush('rate'); ?>
<script type="text/javascript">
  $('#group').on('change', function (e) {

    var value = $('#group').val();

    $('#rate').val(value);

  });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/clientgroups/edit.blade.php ENDPATH**/ ?>