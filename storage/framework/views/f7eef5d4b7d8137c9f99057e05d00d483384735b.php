<?php $__env->startSection('title', '| Retraits'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-suitcase"></i> Retraits
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-suitcase"></i> Retraits </li>
  </ol>
</section>

<div class="modal fade" id="confirm">
    <div class="modal-dialog">
        <form action="" id="deleteForm" method="post">
            <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Confirmation de Suppression</h4>
                  </div>
                  <div class="modal-body">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('DELETE')); ?>

                    <p>Etes-vous sûr(e) de vouloir supprimer ce Retrait?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-xs btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Non, Fermer</button>
                    <button type="submit" name="" class="btn btn-xs btn-danger" data-dismiss="modal" onclick="formSubmit()">Oui, Supprimer</button>
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
                        <h5 class="box-title">Liste Des Retraits</h5>
                        <a href="<?php echo e(route('get_list_deposits')); ?>" class="btn btn-default pull-right"><i class="fa fa-cart-arrow-down"></i> Dépôts</a>
                    </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="display: none;">ID</th>
                                        <th>Code</th>
                                        <th>Client</th>
                                        <th>Total</th>
                                        <th>Remise</th>
                                        <th>Date effective de retrait</th>
                                        <th>Date de dépôt</th>
                                        <th>Date de retrait prévu</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php $__currentLoopData = $deliveries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $delivery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td style="display: none;"><?php echo e($delivery->id); ?></td>
                                            <td style="width: 10%">PE/<?php echo e($delivery->id); ?></td>
                                            <td style="width: 15%"><?php echo e($delivery->client()->fullname); ?></td>
                                            <td><?php echo e($delivery->total); ?></td>
                                            <td><?php echo e($delivery->discount); ?></td>
                                            <td><?php echo e($delivery->instant_retrieve); ?></td>
                                            <td><?php echo e($delivery->deposit_date); ?></td>
                                            <td><?php echo e($delivery->retrieve_date); ?></td>
                                            <td>

                                              <a href="<?php echo e(route('deliveries.show', $delivery->id)); ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Voir</a>

                                           <!-- <a href="<?php echo e(route('deliveries.edit', $delivery->id)); ?>" class="btn btn-info pull-left" style="margin-right: 3px;">Editer</a>
                                            <a href="javascript:;" data-toggle="modal" onclick="deleteData(<?php echo e($delivery->id); ?>)" data-target="#confirm" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Supprimer</a>-->

                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>

                            </table>
                        </div>

                        <div class="box-footer">
                          <a href="<?php echo e(route('checkcustomer')); ?>" class="btn bg-olive pull-right"><i class="fa fa-cart-arrow-down"></i> Nouveau dépôt</a>
                          <!--<a href="<?php echo e(route('deliveries.create')); ?>" class="btn bg-olive pull-right"><i class="fa fa-suitcase"></i> Faire un Retrait</a>-->
                        </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('delivery'); ?>
<script>
function deleteData(id)
     {
         var id = id;
         var url = '<?php echo e(route("deliveries.destroy", ":id")); ?>';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/deliveries/index.blade.php ENDPATH**/ ?>