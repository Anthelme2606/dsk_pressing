<?php $__env->startSection('title', '| Dépôts'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-cart-arrow-down"></i> Dépôts
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-cart-arrow-down"></i> Dépôts en attente</li>
  </ol>
</section>

<div class="modal fade" id="confirm">
    <div class="modal-dialog">
        <form action="" id="deleteForm" method="post">
            <?php echo method_field("PUT"); ?>
            <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Confirmation de traitement</h4>
                  </div>
                  <div class="modal-body">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('PUT')); ?>

                    <p>Voulez-vous traiter ce Dépôt?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-xs btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Non, Fermer</button>
                    <button type="submit" name="" class="btn btn-xs btn-danger" data-dismiss="modal" onclick="formSubmit()">Oui, Accepter</button>
                 </div>
            </div>
        </form>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

    <!-- Main content -->
    <section class="content">
        <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h5 class="box-title">Liste des dépôts en attente de traitement</h5>
                        
                        

                    </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="display: none;">ID</th>
                                        <th style="width: 10%">Code</th>
                                        <th style="width: 15%">Client</th>
                                        <th>Date dépôt</th>
                                        <th style="width: 15%">Date de retrait prévu</th>
                                        <th>Nombre d'articles</th>
                                        <th>Opérations</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td style="display: none;"><?php echo e($deposit->id); ?></td>
                                            <td style="width: 10%"><?php echo e($deposit->code); ?> / <?php echo e($deposit->user()->agency()->name); ?></td>
                                            <td style="width: 15%"><?php echo e($deposit->client()->fullname); ?></td>
                                            <td><?php echo e($deposit->created_at); ?></td>
                                            <td style="width: 15%"><?php echo e($deposit->retrieve_date); ?></td>
                                            <td><?php echo e($deposit->article_qte()); ?></td>
                                            <td>

                                                <a href="<?php echo e(route('deposits.show', $deposit->id)); ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Voir</a>

                                                <a href="javascript:;" data-toggle="modal" onclick="startTreatment(<?php echo e($deposit->id); ?>)" data-target="#confirm" class="btn btn-xs btn-success"><i class="fa fa-hourglass-start"></i> Démarrer</a>

                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>

                            </table>
                        </div>

                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('deposit'); ?>
<script>
function startTreatment(id)
     {
         var id = id;
         var url = '<?php echo e(route("make_in_progress", ":id")); ?>';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/traitements/list_new_deposits.blade.php ENDPATH**/ ?>