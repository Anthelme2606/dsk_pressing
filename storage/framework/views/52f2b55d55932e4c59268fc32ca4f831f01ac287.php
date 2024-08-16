<?php $__env->startSection('title', '| Dépôts'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-cart-arrow-down"></i> Dépôts
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-cart-arrow-down"></i> Dépôts </li>
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

                    <p>Etes-vous sûr(e) de vouloir supprimer ce Dépôt?</p>
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
                        <h5 class="box-title">Liste des dépôts</h5>
                        
                        
                        

                    </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="display: none;">ID</th>
                                        <th style="width: 10%">Code</th>
                                        <th style="width: 15%">Client</th>
                                        <th style="width: 15%">Receptionniste</th>
                                        <th>Date dépôt</th>
                                        <th style="width: 15%">Date de retrait prévu</th>
                                        <th>Etat du dépôt</th>
                                        <th>Total Net</th>
                                        <th>Remise</th>
                                        <th>Total après remise</th>
                                        <th>Avance</th>
                                        <th>Reste</th>
                                        <th>Opérations</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td style="display: none;"><?php echo e($deposit->id); ?></td>
                                            <td style="width: 10%">PE / <?php echo e($deposit->id); ?></td>
                                            <td style="width: 15%"><?php echo e($deposit->client()->fullname); ?></td>
                                            <td style="width: 15%"><?php echo e($deposit->user()->fullname); ?></td>
                                            <td><?php echo e($deposit->deposit_date); ?></td>
                                            <td style="width: 15%"><?php echo e($deposit->retrieve_date); ?></td>
                                            <td>
                                                <?php if($deposit->etat == "waiting"): ?>
                                                <span class="badge badge-primary" style="background-color: blue;">En attente</span>
                                                <?php elseif($deposit->etat == "in_progress"): ?>
                                                <span class="badge badge-warning" style="background-color: orange;">En cours</span>
                                                <?php elseif($deposit->etat == "treated"): ?>
                                                <span class="badge badge-warning" style="background-color: `rgb(218, 221, 12);">Traité</span>
                                                <?php elseif($deposit->etat == "classed"): ?>
                                                <span class="badge" style="background-color: green;">Traité & Rangé</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($deposit->total); ?></td>
                                            <td><?php echo e($deposit->discount); ?></td>
                                            <td><?php echo e($deposit->total - $deposit->discount); ?></td>
                                            <td><?php echo e($deposit->advanced); ?></td>

                                                <?php
                                                    $value = $deposit->total - $deposit->advanced - $deposit->discount;
                                                ?>
                                                <?php if($value < 0): ?>
                                                <td style="color: green;"><?php echo e(- $value); ?> (Relicat)</td>
                                                <?php elseif($value == 0): ?>
                                                <td><?php echo e($value); ?> (Réglé)</td>
                                                <?php elseif($value > 0): ?>
                                                <td style="color: red;"><?php echo e($value); ?> (Reste)</td>
                                                <?php endif; ?>

                                            <td>
                                                <form action="<?php echo e(route('validate_deposit', $deposit->id)); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PUT'); ?>
                                                    <button type="submit" class="btn btn-success btn-xs"><i class="fa fa-suitcase"></i> Retrait</button>
                                                </form>

                                                <a href="<?php echo e(route('deposits.show', $deposit->id)); ?>" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Voir</a>
                                                
                                                <a href="<?php echo e(route('show_deposit', $deposit->id)); ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Voir details</a>
                                                <a href="<?php echo e(route('deposits.partial', $deposit->id)); ?>" class="btn btn-primary btn-xs"><i class="fa fa-suitcase"></i> Retrait partiel</a>
                                                <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin|manager')): ?>
                                                <a href="javascript:;" data-toggle="modal" onclick="deleteData(<?php echo e($deposit->id); ?>)" data-target="#confirm" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Supprimer</a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>

                            </table>
                        </div>

                        <div class="box-footer">
                          <a href="<?php echo e(route('checkcustomer')); ?>" class="btn bg-olive pull-right"><i class="fa fa-cart-arrow-down"></i> Nouveau Dépôt</a>
                        </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('deposit'); ?>
<script>
function deleteData(id)
     {
         var id = id;
         var url = '<?php echo e(route("deposits.destroy", ":id")); ?>';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/deposits/index.blade.php ENDPATH**/ ?>