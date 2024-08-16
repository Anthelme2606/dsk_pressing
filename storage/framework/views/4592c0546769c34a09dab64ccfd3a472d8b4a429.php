<?php $__env->startSection('title', '| Stats des commandes'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-search'></i> Stats des commandes
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-search'></i> Stats des commandes</li>
      </ol>
    </section>

    <section class="content">
    <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Recherche</h3>
            </div>

            <form role="form" method="POST" action="<?php echo e(route('sendData')); ?>">
            	<?php echo csrf_field(); ?>
	            <div class="box-body">
	              <div class="row">
	                <div class="col-xs-4">
                    <label class="">Du</label>
	                  <input type="date" class="form-control" name="date_debut" id="date_debut" placeholder="Date de début" required>
	                </div>
	                <div class="col-xs-4">
                    <label class="">Au</label>
	                  <input type="date" class="form-control" name="date_fin" id="date_fin" placeholder="Date de fin" required>
	                </div>
	                <div class="col-xs-4">
	                  <button class="btn bg-olive" type="submit">Rechercher <i class="fa fa-search" style="font-size: 1em"></i></button>
	                </div>
	              </div>
	            </div>
            <!-- /.box-body -->
        	</form>
          </div>
      </section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('control'); ?>
<script type="text/javascript">
   var d = new Date();
   var d1 = new Date();
   d1.setDate(d1.getDate()-8);
   document.getElementById('date_debut').valueAsDate = d1;
   document.getElementById('date_fin').valueAsDate = d;
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/stats/range.blade.php ENDPATH**/ ?>