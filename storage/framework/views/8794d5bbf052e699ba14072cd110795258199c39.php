<?php $__env->startSection('title', '| Editer caissier'); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h4>
    <i class='fa fa-user-plus'></i> Caissiers
  </h4>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class='fa fa-user-plus'></i> Editer caissier</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">

    <div class='col-md-8 col-md-offset-2'>
        <div class="box box-primary">
            <div class="box-header with-border">
              <h4 class="box-tite"><b> Edition du caissier:</b> <em style="color:rgb(5, 146, 104)"><?php echo e($user->fullname); ?></em></h4>
            </div>

            <form action="<?php echo e(route('tellers.update', $user->id)); ?>" class="form-horizontal form-box remove-margin" method="POST" enctype="multipart/form-data">
                <?php echo method_field("PATCH"); ?>
                <?php echo csrf_field(); ?>
        

        <div class="box-body">

            <div class="row">
              <div class="col-md-10 col-md-offset-1 ">

                <div class="form-group">
                  <label for="fullname">Nom et prénoms</label>
                  <input type="text" id="fullname" name="fullname" class="form-control" value="<?php echo e($user->fullname); ?>" required>
                  
                  
                </div>
              </div>
              <div class="col-md-5 col-md-offset-1">

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" name="email" value="<?php echo e($user->email); ?>" class="form-control" >
                      
                </div>

                <div class="form-group">
                  <label for="password">Mot de passe</label>
                  <input type="password" id="password" name="password" class="form-control" required>
                      
                </div>

                <div class="form-group">
                  <label for="address">Ville de résidence</label>
                  <input type="text" id="address" name="address" class="form-control" value="<?php echo e($user->address); ?>" required>
                  
                </div>


                <h5><b>Assigner Rôle</b></h5><br>
              <div>
                
                  <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <input type="checkbox" class="form-check-input" name="roles[]" value="<?php echo e($role->id); ?>" id="<?php echo e($role->id); ?>" 
                      <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userRole): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($userRole->id === $role->id): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                      <label for="<?php echo e($role->id); ?>" class="form-check-label"> <?php echo e($role->name); ?></label><br><br>
                      
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>

              </div>

              <div class="col-md-4 col-md-offset-1">

                <div class="form-group">
                  <label for="phone_number">Numero de téléphone</label>
                  <input type="number" id="phone_number" name="phone_number" min="0" class="form-control" value="<?php echo e($user->phone_number); ?>" required>
                  
                </div>


                  <div class="form-group">
                    <label for="password">Confirmation du mot de passe</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                        

                  </div>

                  <div class="form-group">
                    <label for="picture">Image de profil</label>
                    <input type="file" id="picture" name="picture" class="form-control" >
                      
                  </div><br>

                  <div class="form-group">
                    <label for="agency">Agence de l'utilisateur</label>
                    <select id="agency_id" name="agency_id" class="form-control" required>
                      <option value="">Choisir une agence</option>
                      <?php $__currentLoopData = $agencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($agency->id); ?>"><?php echo e($agency->name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
              </div>
            </div>
           

        </div>

        <div class="box-footer"> 
            <input type="submit" class="btn bg-olive" value="Editer" style="border-radius: 5px;">
            
        </div>

        

     </div>
    </div>

 </div>
</section>

<script>
    function changeToUpperCase(t){
      var eleVal = document.getElementById(t.name);
      eleVal.value= eleVal.value.toUpperCase();
      
    }
  </script>
  <script>
    $('#firstname').on('keypress', function() { 
        var $this = $(this), value = $this.val(); 
        if (value.length === 1) { 
          $this.val( value.charAt(0).toUpperCase() );
        }  
    });

    $('#address').on('keypress', function() { 
        var $this = $(this), value = $this.val(); 
        if (value.length === 1) { 
          $this.val( value.charAt(0).toUpperCase() );
        }  
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/tellers/edit.blade.php ENDPATH**/ ?>