{{-- \resources\views\deposits\show.blade.php --}}
@extends('layouts.app3')

@section('title', '| Mon profil')

@section('content')

<br><section class="content-header">
      <h4 style="color: rgb(58, 85, 77);">
        <i class="fa fa-user"></i> <b>Mon profil</b>
      </h4>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Paramètres</a></li>
        <li class="active">Mon profil</li>
      </ol>
    </section>


    <!-- Main content -->
<section class="content">
	@include('inc.messages')
	<div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
				@if(Auth::guard('admin')->user()->picture != null)
              		<img class="profile-user-img img-responsive img-circle" src="{{url('/storage/profile_images/'.Auth::guard('admin')->user()->picture)}}" alt="User profile picture" style="height:150px; width:150px;">
				@else
					<img class="profile-user-img img-responsive img-circle" src="{{url('avatar.jpg')}}" alt="User profile picture">
				@endif
              {{-- <br><h4 class="profile-username text-center" style="color:rgb(5, 146, 104)"><b>{{Auth::guard('admin')->user()->fullname}}</b></h4> --}}

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
            	<strong><i class="fa fa-envelope margin-r-5"></i> Email: {{Auth::guard('admin')->user()->email}}
                 </strong><br>

				
            
              <strong><i class="fa fa-user margin-r-5"></i> Nom complet: {{Auth::guard('admin')->user()->fullname}} </strong><br>
             
              <hr>
           
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
		            <form class="form-horizontal" method="POST" action="{{ route('profils.store') }}">
		            	@csrf
		              <div class="box-body">

		                <div class="form-group is-empty">
		                  <label for="inputName" class="col-sm-4 control-label">Nom complet</label>

		                  <div class="col-sm-8">
		                    <input type="text" class="form-control" id="inputName" placeholder="Votre nom" name="name" value="{{Auth::guard('admin')->user()->fullname}}">
		                  </div>
		                </div>

		                {{-- <div class="form-group is-empty">
		                  <label for="inputFirstname" class="col-sm-4 control-label">Prénom(s)</label>

		                  <div class="col-sm-8">
		                    <input type="text" class="form-control" id="inputFirstname" placeholder="Prénom(s)" name="firstname" value="{{auth()->user()->firstname}}">
		                  </div>
		                </div> --}}

						

		                <div class="form-group is-empty">
		                  <label for="inputEmail" class="col-sm-4 control-label">Adresse E-mail</label>

		                  <div class="col-sm-8">
		                    <input type="email" class="form-control" id="inputEmail" placeholder="Votre adresse email" name="email" value="{{Auth::guard('admin')->user()->email}}">
		                  </div>
		                </div>

						<div class="form-group is-empty">
							<label for="picture" class="col-sm-8 control-label" style="color: rgb(5, 146, 104);">Cliquer ici pour modifier votre photo de profil</label>
							<div class="col-sm-4">
								<input type="file" id="picture" placeholder="Choisir une image" name="picture" style="border-color: red; ">
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
 @endsection