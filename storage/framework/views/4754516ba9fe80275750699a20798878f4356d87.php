<?php $__env->startSection('title', '| Recherche d\'un bilan journalier spécifique'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-search'></i> Recherche d'un bilan journalier spécifique
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-search'></i> Recherche d'un bilan journalier spécifique</li>
      </ol>
    </section>

    <section class="content">
    <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Recherche</h3>
            </div>

            <form role="form" method="POST" action="<?php echo e(route('searchDaily')); ?>">
            	<?php echo csrf_field(); ?>
	            <div class="box-body">
	              <div class="row">
	                <div class="col-xs-6">
                    <label class="">Etat des opérations du</label>
	                  <input type="date" class="form-control" name="date_debut" id="date_debut" placeholder="Selectionner la date" required>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/statsDaily/searchDaily.blade.php ENDPATH**/ ?>