<?php $__env->startSection('title', '| Rôles'); ?>

<?php $__env->startSection('content'); ?>

<section class="content-header">
      <h1>
        <i class="fa fa-key"></i>Roles
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
         <li class="active"><i class="fa fa-key"></i> Rôles</li>
      </ol>
</section>

    <!-- Main content -->
<section class="content">
      <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Table des Rôles</h3>
          <a href="<?php echo e(route('users.index')); ?>" class="btn btn-default pull-right">Utilisateurs</a>
            <a href="<?php echo e(route('permissions.index')); ?>" class="btn btn-default pull-right">Permissions</a>
        </div>
            <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Role</th>
                                <th>Permissions</th>
                                <th>Operation</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($role->name); ?></td>
                                <td><?php echo e(str_replace(array('[',']','"'),'', $role->permissions()->pluck('name'))); ?></td>
                                <td>
                                <a href="<?php echo e(route('roles.edit', $role->id)); ?>" class="btn btn-info  btn-xs pull-left" style="margin-right: 3px;">Editer</a>
                                <form action="<?php echo e(route('roles.destroy', $role->id)); ?>">
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-danger btn-xs" type="submit">Supprimer</button>
                                </form>

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>

                    </table>
                </div>

                <div class="box-footer clearfix">
                  <a href="<?php echo e(URL::to('roles/create')); ?>" class="btn bg-olive">Ajouter Role</a>
                </div>

    </div>
        </div>

    </div>
</section>
    <!-- /.content -->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/roles/index.blade.php ENDPATH**/ ?>