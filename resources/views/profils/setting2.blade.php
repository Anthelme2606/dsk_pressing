{{-- \resources\views\profils\setting.blade.php --}}
@extends('layouts.app2')

@section('title', '| Changer mot de passe')

@section('content')
<!-- Content Header (Page header) -->
    <br><section class="content-header">
      <h4 style="color: rgb(58, 85, 77);">
        <i class='fa fa-cog'></i> Paramètres
      </h4>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-cog'></i> Paramètres</li>
      </ol>
    </section>

<!-- Main content -->

<section class="content">
            @include('inc.messages')
            <div class='col-lg-8 col-lg-offset-2'>
                  <div class="box box-info">
		            <div class="box-header with-border">
		              <h4 class="box-tite"><b>Changer de mot de passe</b></h4>
		            </div>
		            <!-- /.box-header -->
		            <!-- form start -->
		            <form class="form-horizontal" method="POST" action="{{route('change_password')}}">
						
		            	@csrf
		              <div class="box-body">

						<div class="form-group is-empty">
							<label for="inputPassword1" class="col-sm-4 control-label">Mot de passe actuel</label>
  
							<div class="col-sm-8">
								<div class="col-md-11">
								  <input type="password" name="old_password" class="form-control" placeholder="Votre mot de passe actuel" id="old_pwd" required/>
								</div>
								<div class="col-md-1">
								  <span class="form-feedback pull-right">
									<i type="button" class="fa fa-eye-slash" id="icon_old_pwd"  onclick="show_old_password()"></i>
								  </span>
								</div>
							  </div>
						  </div>

		                <div class="form-group is-empty">
		                  <label for="inputPassword2" class="col-sm-4 control-label">Nouveau Mot de passe</label>

		                  <div class="col-sm-8">
							<div class="col-md-11">
							  <input type="password" name="new_password" class="form-control" placeholder="Votre nouveau mot de passe" id="pwd" required/>
							</div>
							<div class="col-md-1">
							  <span class="form-feedback pull-right">
								<i type="button" class="fa fa-eye-slash" id="icon_pwd"  onclick="show_password()"></i>
							  </span>
							</div>
						  </div>
		                </div>

		                <div class="form-group is-empty">
		                  <label for="inputPassword3" class="col-sm-4 control-label">Confirmation mot de passe</label>

		                  <div class="col-sm-8">
							<div class="col-md-11">
							  <input type="password" name="old_password" class="form-control" placeholder="Confirmation" id="pwd_confirm" required/>
							</div>
							<div class="col-md-1">
							  <span class="form-feedback pull-right">
								<i type="button" class="fa fa-eye-slash" id="icon_confirm" style="padding-bottom: -5px;" onclick="show_password_c()"></i>
							  </span>
							</div>
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

			<script>
				function show_password_c(){
                    let pwd_confirm = document.getElementById('pwd_confirm');
                    let icon_pwd_confirm = document.getElementById("icon_confirm")
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
                    let pwd = document.getElementById('pwd')
                    if(pwd.type == "password"){
                      pwd.type = "text";
                      icon_pwd.className = "fa fa-eye-slash"
                    } else {
                      pwd.type = "password";
                      icon_pwd.className = "fa fa-eye"
                    }
                    
                  }

				  function show_old_password(){
                    let icon_pwd = document.getElementById('icon_old_pwd');
                    let pwd = document.getElementById('old_pwd')
                    if(pwd.type == "password"){
                      pwd.type = "text";
                      icon_pwd.className = "fa fa-eye-slash"
                    } else {
                      pwd.type = "password";
                      icon_pwd.className = "fa fa-eye"
                    }
                    
                  }
			</script>
          </section>
@endsection