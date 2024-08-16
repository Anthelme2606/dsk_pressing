<?php $__env->startSection('title', '| Mon profil'); ?>

<?php $__env->startSection('content'); ?>

<section class="content-header">
      <h4>
        <i class="fa fa-user"></i> Mon profil
      </h4>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Paramètres</a></li>
        <li class="active">Mon profil</li>
      </ol>
    </section>



    <!-- Main content -->
<section class="content">
	<?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
                <form action="<?php echo e(route('change_profile_image')); ?>" method="post" id="profile.form" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php if(auth()->user()->picture != null): ?>
                        <img class="profile-user-img img-responsive img-circle" id="coverPreview" src="<?php echo e(url('/public/storage/profile_images/'.auth()->user()->picture)); ?>" alt="User profile picture">
                    <?php else: ?>
                        <img class="profile-user-img img-responsive img-circle" id="coverPreview" src="<?php echo e(asset('/public/avatar.jpeg')); ?>" alt="User profile picture">
                    <?php endif; ?>
                    <input type="file" id="cover" accept="jpeg, png" name="image"/>
                    <div style="text-align: center; margin-bottom: -25px;">
                        <button type="submit" class="btn btn-primary">Changer</button>
                    </div>
                </form>
                <style>
                    #cover{
                        display: none;
                    }
                </style>
                <script>
                    let coverPreview = document.getElementById('coverPreview');
                    let cover = document.getElementById('cover');
                    let profile = document.getElementById('profile.form');

                    coverPreview.addEventListener('click',_=>{
                        cover.click();
                    });

                    cover.addEventListener("change",_=>{
                        let file = cover.files[0];
                        let reader = new FileReader();
                        reader.onload = function (){
                            coverPreview.src = reader.result;
                        }
                        reader.readAsDataURL(file);

                    });
                    //
                </script>



              <br><h4 class="profile-username text-center" style="color:rgb(5, 146, 104)"><b><?php echo e(auth()->user()->fullname); ?></b></h4>

              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h4 class="box-tite">A propos de moi</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<strong><i class="fa fa-envelope margin-r-5"></i> Email</strong><br>

				<br><p class="text-muted" style="color:rgb(5, 146, 104)">
                <?php echo e(auth()->user()->email); ?>

              </p>

              <hr>
              <strong><i class="fa fa-phone margin-r-5"></i> Téléphone</strong><br>

              <br><p class="text-muted" style="color:rgb(5, 146, 104)">
                <?php echo e(auth()->user()->phone_number); ?>

              </p>

              <hr>
              <strong><i class="fa fa-map-marker margin-r-5"></i> Adresse</strong><br>

              <br><p class="text-muted" style="color:rgb(5, 146, 104)"><?php echo e(auth()->user()->address); ?></p>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <div class="col-md-9">
        	<div class="box box-info">
		            <div class="box-header with-border">
		              <h4 class="box-tite"><b>Changer mes informations de profil</b></h4>
		            </div>
		            <!-- /.box-header -->
		            <!-- form start -->
		            <form class="form-horizontal" method="POST" action="<?php echo e(route('profils.store')); ?>">
		            	<?php echo csrf_field(); ?>
		              <div class="box-body">

		                <div class="form-group is-empty">
		                  <label for="inputName" class="col-sm-4 control-label">Nom complet</label>

		                  <div class="col-sm-8">
		                    <input type="text" class="form-control" id="inputName" placeholder="Votre nom" name="fullname" value="<?php echo e(auth()->user()->fullname); ?>">
		                  </div>
		                </div>

		                

		                <div class="form-group is-empty">
		                  <label for="inputEmail" class="col-sm-4 control-label">Email</label>

		                  <div class="col-sm-8">
		                    <input type="email" class="form-control" id="inputEmail" placeholder="Votre adresse email" name="email" value="<?php echo e(auth()->user()->email); ?>">
		                  </div>
		                </div>

		                <div class="form-group is-empty">
		                  <label for="inputTel" class="col-sm-4 control-label">Téléphone</label>

		                  <div class="col-sm-8">
		                    <input type="text" class="form-control" id="inputTel" placeholder="Numéro de Téléphone" name="phone_number" value="<?php echo e(auth()->user()->phone_number); ?>">
		                  </div>
		                </div>

		                <div class="form-group is-empty">
		                  <label for="inputCity" class="col-sm-4 control-label">Adresse</label>

		                  <div class="col-sm-8">
		                    <textarea class="form-control" id="inputCity" placeholder="Adresse - Ville de résidence" name="address"><?php echo e(auth()->user()->address); ?></textarea>
		                  </div>
		                </div>


		              </div>
		              <!-- /.box-body -->
		              <div class="box-footer">
		                <button type="reset" class="btn btn-danger">Annuler</button>
		                <button type="submit" class="btn btn-info pull-right">Modifier</button>
		              </div>
		              <!-- /.box-footer -->
		            </form>
		          </div>
                <!-- /.box -->
        </div>

    </div>
</section>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/profils/index.blade.php ENDPATH**/ ?>