<?php $__env->startSection('title', '| Clients'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h4>
    <i class="fa fa-smile-o"></i> Clients
  </h4>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-smile-o"></i> Clients </li>
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
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <p>Etes-vous sûr(e) de vouloir supprimer ce Client?</p>
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
                        <h4 class="box-tite"><b>Administration des Clients</b></h4>
                        
                        
                    </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nom complet</th>
                                        <th>Email</th>
                                        <th>Téléphone</th>
                                        <th>Adresse</th>
                                        <th>Numero de compte</th>
                                        <th>Solde</th>
                                        <th>Sponsorship code</th>
                                        <th>Date/Heure d'Ajout</th>
                                        <th>Operations</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>

                                        <td><?php echo e($client->fullname); ?></td>
                                        <td><?php echo e($client->email); ?></td>
                                        <td><?php echo e($client->phone_number); ?></td>
                                        <td><?php echo e($client->address); ?></td>
                                        <td><?php echo e($client->account($client->account_id)["num"]); ?></td>
                                        <td><?php echo e($client->account($client->account_id)["amount"]); ?></td>
                                        <td><?php echo e($client->sponsorship($client->sponsorship_code)["sponsor_code"]); ?></td>
                                        <td><?php echo e($client->created_at->format('F d, Y h:ia')); ?></td>
                                        <td>
                                        <a href="<?php echo e(route('clients.edit', $client->id)); ?>" class="btn btn-info btn-xs pull-left" style="margin-right: 3px;"><i class="fa fa-edit"></i> Editer</a>

                                        
                                        <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
                                        <a href="javascript:;" data-toggle="modal" onclick="deleteData(<?php echo e($client->id); ?>)" data-target="#confirm" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Supprimer</a>
                                        <?php endif; ?>
                                        

                                        
                                        
                                        

                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>

                            </table>
                        </div>

                        <div class="box-footer clearfix">
                          <a href="<?php echo e(route('clients.create')); ?>" class="btn bg-olive" style="border-radius: 3px;"><i class="fa fa-plus"></i>  Ajouter Client</a>
                        </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('client'); ?>
<script>
function deleteData(id)
     {
         var id = id;
         var url = '<?php echo e(route("clients.destroy", ":id")); ?>';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/clients/index.blade.php ENDPATH**/ ?>