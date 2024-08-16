<?php $__env->startSection('title', '| Entrées et sorties'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-plus-square"></i> Entrées et sorties
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-plus-square"></i> Entrées et sorties </li>
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

                    <p>Etes-vous sûr(e) de vouloir supprimer cette action?</p>
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

<div class="modal fade" id="validate">
    <div class="modal-dialog">
        <form action="" id="validateForm" method="post">
            <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Validation de l'action</h4>
                  </div>
                  <div class="modal-body">
                    <?php echo e(csrf_field()); ?>

                    <?php echo method_field('PUT'); ?>
                    <p>Etes-vous sûr(e) de vouloir confirmer cette action?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-xs btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Non, Fermer</button>
                    <button type="submit" name="" class="btn btn-xs btn-danger" data-dismiss="modal" onclick="validateFormSubmit()">Oui, Valider</button>
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
                <h5 class="box-title">Mouvement</h5>
                <a href="<?php echo e(route('in_out.create')); ?>" class="btn bg-olive pull-right"><i class='fa fa-plus-square'></i>  Ajouter Entrée/Sortie</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Libellé</th>
                            <th>Montant</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Effectué le</th>
                            <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'manager')): ?>
                            <th>Statut</th>
                            <?php endif; ?>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__currentLoopData = $in_outs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in_out): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                            <td><?php echo e($in_out->libelle); ?></td>
                            <td><?php echo e($in_out->montant); ?></td>
                            <td>
                                <?php if($in_out->type == 'in'): ?>
                                    <span class="badge" style="background-color: green; color: white;">Entrée</span>
                                <?php else: ?>
                                <span class="badge" style="background-color: red; color: white;">Sortie</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($in_out->action_date); ?></td>
                            <td><?php echo e($in_out->created_at); ?></td>
                            <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'manager')): ?>
                            <td>
                                <?php if($in_out->status == 0): ?>
                                    <span class="badge" style="background-color: red; color: white;">Non validé</span>
                                <?php else: ?>
                                    <span class="badge" style="background-color: green; color: white;">Validé</span>
                                <?php endif; ?>
                            </td>
                            <?php endif; ?>
                            <td>
                            <a href="<?php echo e(route('in_out.edit', $in_out->id)); ?>" class="btn btn-info btn-xs" style="margin-right: 3px;"><i class="fa fa-edit"></i> Editer</a>

                            <a href="javascript:;" data-toggle="modal" onclick="deleteData(<?php echo e($in_out->id); ?>)"
                            data-target="#confirm" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Supprimer</a>

                            <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'manager')): ?>
                            <?php if($in_out->status == 0): ?>
                            <a href="javascript:;" data-toggle="modal" onclick="validateData(<?php echo e($in_out->id); ?>)"
                                data-target="#validate" class="btn btn-xs btn-danger"><i class="fa fa-check"></i> Validation</a>
                            </td>
                            <?php endif; ?>
                            <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td style="font-size: 24px; font-weight: bold; color: black;">Total des entrées : <span style="color: green; font-weight: bold; font-size: 18px;"><?php echo e($in_price); ?></span></td>
                            <td style="font-size: 24px; font-weight: bold; color: black;">Total des sorties : <span style="color: red; font-weight: bold; font-size: 18px;"><?php echo e($out_price); ?></span></td>
                        </tr>
                    </tfoot>

                </table>
            </div>

            <div class="box-footer clearfix">
              <a href="<?php echo e(route('in_out.create')); ?>" class="btn bg-olive"><i class='fa fa-plus-square'></i>  Ajouter une entrée/sortie</a>

            </div>
        </div>
    </div>
</div>

    </section>
    <!-- /.content -->

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script>
function deleteData(id)
     {
         var id = id;
         var url = '<?php echo e(route("in_out.destroy", ":id")); ?>';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }

     function confirmData(id)
     {
         var id = id;
         var url = '<?php echo e(route("in_out.validate", ":id")); ?>';
         url = url.replace(':id', id);
         $("#validateForm").attr('action', url);
     }

     function validateFormSubmit()
     {
         $("#validateForm").submit();
     }
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/in_out/index.blade.php ENDPATH**/ ?>