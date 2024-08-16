<?php $__env->startSection('title', '| Rôles'); ?>

<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Utilisateurs
        </h1>
        <ol class="breadcrumb">
            <li><a href="#" ><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><i class="fa fa-users"></i> Utilisateurs</li>
        </ol>
    </section>

    <div class="modal fade" id="confirm">
        <div class="modal-dialog">
            <form action="" id="deleteForm" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Confirmation de suppression</h4>
                    </div>
                    <div class="modal-body">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('DELETE')); ?>

                        <p>Etes-vous sûr(e) de vouloir supprimer cet utilisateur?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-xs btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Non, Fermer</button>
                        <button type="submit" name="" class="btn btn-xs btn-danger" data-dismiss="modal" onclick="formSubmit()">Oui, Supprimer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h4 class="box-tite"><b> Administration des utilisateurs</b></h4>
                        <a href="<?php echo e(route('roles.index')); ?>" class="btn btn-default pull-right">Rôles</a>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nom complet</th>
                                <th>Email</th>
                                <th>Date/Heure d'ajout</th>
                                <th>Rôles</th>
                                <th>Operations</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>

                                    <td><?php echo e($user->fullname); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td><?php echo e($user->created_at->format('d/m/Y à H:i')); ?></td>
                                    <td><?php echo e($user->getRoleNames()); ?></td>
                                    
                                    <td>
                                        <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="btn btn-xs btn-info pull-left" style="margin-right: 3px;"><i class="fa fa-edit"></i> Editer</a>

                                        <a href="javascript:;" data-toggle="modal" onclick="deleteData(<?php echo e($user->id); ?>)" data-target="#confirm" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Supprimer</a>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table>
                    </div>
                    <div class="box-footer">
                        <a href="<?php echo e(route('users.create')); ?>" class="btn bg-olive" style="border-radius: 5px;">Ajouter utilisateur</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function deleteData(id)
        {
            var id = id;
            var url = '<?php echo e(route("users.destroy", ":id")); ?>';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit()
        {
            $("#deleteForm").submit();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/users/index.blade.php ENDPATH**/ ?>