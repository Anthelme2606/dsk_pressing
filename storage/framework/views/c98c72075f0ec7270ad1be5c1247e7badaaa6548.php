<?php $__env->startSection('title', '| Ajouter utilisateur'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h4><i class='fa fa-user-plus'></i> Ajouter utilisateur</h4>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-user-plus'></i> Ajouter utilisateur</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">
      <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <div class='col-md-10 col-md-offset-1'>
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h4 class="box-tite"><b> Ajout d'un nouvel utilisateur</b></h4>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo e(route('users.store')); ?>" class="box-body" method="POST" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nom complet <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="fullname" id="fullname" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Adresse email <span style="color: red;">*</span></label>
                                    <input type="email" class="form-control" name="email" id="email" required/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mot de passe <span style="color: red;">*</span></label>
                                    <div class="row">
                                        <div class="col-md-11">
                                            <input type="password" name="password" class="form-control" placeholder="Veuillez définir un mot de passe" id="pwd" value="<?php echo e(old('password')); ?>" required/>
                                        </div>
                                        <div class="col-md-1">
                                            <span class="form-feedback pull-right">
                                              <i type="button" class="fa fa-eye-slash" id="icon_pwd"  onclick="show_password()"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Confirmation du mot de passe <span style="color: red;">*</span></label>
                                    <div class="row">
                                        <div class="col-md-11">
                                            <input type="password" class="form-control" name="password_confirmation" placeholder="Veuillez resaisir votre mot de passe " id="pwd_confirm" onchange="confirm()" value="<?php echo e(old('password_confirmation')); ?>" required/>
                                        </div>
                                        <div class="col-md-1">
                                            <span class="form-feedback pull-right">
                                              <i class="fa fa-eye-slash" id="icon_confirm" type="button" style="margin-right: 10px; margin-top: 12px;" onclick="show_password_c()"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Numero de téléphone <span style="color: red;">*</span></label>
                                    <input type="tel" class="form-control" name="phone_number" id="phone_number" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Adresse <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Togo, Lomé, Totsi-Gblinkomé, 10, 22" required/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Agence d'affiliation <span style="color: red;">*</span></label>
                                    <select name="agency" id="agency" class="form-control" required>
                                        <?php $__currentLoopData = $agencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($agency->id); ?>"><?php echo e($agency->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Assigner Role <span style="color: red;">*</span></label>
                                    <select name="role" id="role" class="form-control" required>
                                        <option value="Manager">Manager</option>
                                        <option value="Caissier">Caissier</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-raised btn-block btn-flat" type="submit">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
      </div>
    </section>
    <!-- /.content -->
    <script>

    function show_password_c(){
        let pwd_confirm = document.getElementById('pwd_confirm');
        let icon_pwd_confirm = document.getElementById("icon_confirm");
        if(pwd_confirm.type == "password"){
            pwd_confirm.type = "text";
            icon_pwd_confirm.className = "fa fa-eye-slash"
        } else {
            pwd_confirm.type = "password";
            icon_pwd_confirm.className = "fa fa-eye"
        }
    }

    function show_password(){
        let icon_pwd = document.getElementById('icon_pwd');
        let pwd = document.getElementById('pwd');
        if(pwd.type == "password"){
            pwd.type = "text";
            icon_pwd.className = "fa fa-eye-slash"
        } else {
            pwd.type = "password";
            icon_pwd.className = "fa fa-eye"
        }

    }
    $('#pwd_confirm').keyup(function() {
        var password = $('#pwd')
        var pwd_confirm = $(this)
        var message = $('#message')
        var submit = $('#register_btn')
        if (confirm.val() !== password.val()) {
            console.log(confirm.val() + ' === ' + password.val())
            message.html('La confirmation ne correspond pas au mot de passe').css("color", "red")
        } else {
            message.html('Confirmation correcte').css("color", "green")
        }
    })
    function confirm(){
        let pwd = document.getElementById('pwd').value;
        let pwd_confirm = document.getElementById('pwd_confirm').value;
        let message = document.getElementById('message');
        if(pwd == pwd_confirm){
            message.style.color = 'green';
            message.innerHTML = "La confirmation correspond au mot de passe"

        } else {
            message.style.color = 'red';
            message.innerHTML = "La confirmation ne correspond pas au mot de passe"
        }
    }


</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/users/create.blade.php ENDPATH**/ ?>