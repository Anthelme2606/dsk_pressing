<?php $__env->startSection('title', '| Recherche sur Vente'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-search'></i> Retrait de la journée
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-search'></i> Retrait de la journée</li>
      </ol>
    </section>

    <section class="content">
      <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Recherche</h3>
            </div>

            <form role="form" method="POST" action="<?php echo e(route('totake')); ?>">
            	<?php echo csrf_field(); ?>
	            <div class="box-body">
	              <div class="row">
	                <div class="col-xs-4">
                    <label class="">Date de retrait</label>
	                  <input type="date" class="form-control" name="date_totake"  placeholder="Date de retrait" value="<?php echo e($date); ?>">
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
   document.getElementById('date_totake').valueAsDate = d;
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/stats/totake.blade.php ENDPATH**/ ?>