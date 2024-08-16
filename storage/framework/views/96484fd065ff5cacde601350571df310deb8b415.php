<?php $__env->startSection('title', '| Clients fidèles'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-plus-square"></i> Clients Fidèles
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-plus-square"></i> Clients Fidèles </li>
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

                    <p>Etes-vous sûr(e) de vouloir retirer ce client des Clients fidèles?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-xs btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Non, Fermer</button>
                    <button type="submit" name="" class="btn btn-xs btn-danger" data-dismiss="modal" onclick="formSubmit()">Oui, Retirer</button>
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
                <h5 class="box-title">Liste des Clients fidèles et leurs Groupes de Fidélisation</h5>
                <a href="<?php echo e(route('clientgroups.create')); ?>" class="btn bg-olive pull-right"><i class='fa fa-plus-square'></i>  Fidéliser Client</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Noms</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Groupe</th>
                            <th>Taux de Remise</th>
                            <th>Date/Heure d'Ajout</th>
                            <th>Operations</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__currentLoopData = $clientgroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clientgroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                            <td><?php echo e($clientgroup->client()->fullname); ?></td>
                            <td><?php echo e($clientgroup->client()->phone_number); ?></td>
                            <td><?php echo e($clientgroup->client()->email); ?></td>
                            <td><?php echo e($clientgroup->group()->title); ?></td>
                            <td><?php echo e($clientgroup->group()->rate); ?> %</td>
                            <td><?php echo e($clientgroup->created_at->format('F d, Y h:ia')); ?></td>
                            <td>
                            <a href="<?php echo e(route('clientgroups.edit', $clientgroup->id)); ?>" class="btn btn-info btn-xs" style="margin-right: 3px;"><i class="fa fa-edit"></i> Editer</a>

                            <a href="javascript:;" data-toggle="modal" onclick="deleteData(<?php echo e($clientgroup->id); ?>)"
                            data-target="#confirm" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Supprimer</a>

                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>

                </table>
            </div>

            <div class="box-footer clearfix">
              <a href="<?php echo e(route('clientgroups.create')); ?>" class="btn bg-olive"><i class='fa fa-plus-square'></i>  Fidéliser Client</a>
            </div>
        </div>
    </div>
</div>

    </section>
    <!-- /.content -->

<?php $__env->stopSection(); ?>
<?php $__env->startPush('clientgroup'); ?>
<script>
function deleteData(id)
     {
         var id = id;
         var url = '<?php echo e(route("clientgroups.destroy", ":id")); ?>';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/clientgroups/index.blade.php ENDPATH**/ ?>