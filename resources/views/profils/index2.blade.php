{{-- \resources\views\deposits\show.blade.php --}}
@extends('layouts.app2')

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
				@if(Auth::guard('client')->user()->picture != null)
              		<img class="profile-user-img img-responsive img-circle" src="{{url('/storage/profile_images/'.Auth::guard('client')->user()->picture)}}" alt="User profile picture" style="height:150px; width:150px;">
				@else
					<img class="profile-user-img img-responsive img-circle" src="{{url('public/avatar.jpeg')}}" alt="User profile picture">
				@endif
              {{-- <br><h4 class="profile-username text-center" style="color:rgb(5, 146, 104)"><b>{{Auth::guard('client')->user()->fullname}}</b></h4> --}}

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
            	<strong><i class="fa fa-envelope margin-r-5"></i> Email </strong><br>

				<br><p class="text-muted col-md-offset-1" style="color:rgb(5, 146, 104);">
                 {{Auth::guard('client')->user()->email}}
              </p>

              <hr>
              <strong><i class="fa fa-phone margin-r-5"></i> Téléphone</strong><br>

              <br><p class="text-muted col-md-offset-1" style="color:rgb(5, 146, 104);">
                 {{Auth::guard('client')->user()->phone_number}}
              </p>

              <hr>
              <strong><i class="fa fa-map-marker margin-r-5"></i> Adresse</strong><br>

              <br><p class="text-muted col-md-offset-1" style="color:rgb(5, 146, 104);"> {{Auth::guard('client')->user()->address}}</p>
			  <hr>
              <strong><i class="fa fa-dollar margin-r-5"></i> Numéro de compte</strong><br>

              <br><p class="text-muted col-md-offset-1" style="color:rgb(5, 146, 104);"> {{Auth::guard('client')->user()->account()->num}}</p>
			  <hr>
              <strong><i class="fa fa-barcode margin-r-5"></i> Code de parrainage</strong><br>

              <br><p class="text-muted col-md-offset-1" style="color:rgb(5, 146, 104);"> {{Auth::guard('client')->user()->sponsorship()->sponsorship_code}}</p>

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
		                    <input type="text" class="form-control" id="inputName" placeholder="Votre nom" name="name" value="{{Auth::guard('client')->user()->fullname}}">
		                  </div>
		                </div>

		                {{-- <div class="form-group is-empty">
		                  <label for="inputFirstname" class="col-sm-4 control-label">Prénom(s)</label>

		                  <div class="col-sm-8">
		                    <input type="text" class="form-control" id="inputFirstname" placeholder="Prénom(s)" name="firstname" value="{{auth()->user()->firstname}}">
		                  </div>
		                </div> --}}

						<div class="form-group is-empty">
							<label for="birthday" class="col-sm-4 control-label">Date de naissance</label>

							<div class="col-sm-8">
							  <input type="date" class="form-control" id="birthday" placeholder="Votre date de naissance" name="birthday" value="{{Auth::guard('client')->user()->birthday}}">
							</div>
						  </div>

		                <div class="form-group is-empty">
		                  <label for="inputEmail" class="col-sm-4 control-label">Adresse E-mail</label>

		                  <div class="col-sm-8">
		                    <input type="email" class="form-control" id="inputEmail" placeholder="Votre adresse email" name="email" value="{{Auth::guard('client')->user()->email}}">
		                  </div>
		                </div>

		                <div class="form-group is-empty">
		                  <label for="inputTel" class="col-sm-4 control-label">Téléphone mobile</label>

		                  <div class="col-sm-8">
		                    <input type="text" class="form-control" id="inputTelMob" placeholder="Numéro de Téléphone mobile" name="phone_number" value="{{Auth::guard('client')->user()->phone_number}}">
		                  </div>
		                </div>

						<div class="form-group is-empty">
							<label for="inputTel" class="col-sm-4 control-label">Téléphone fixe</label>

							<div class="col-sm-8">
							  <input type="text" class="form-control" id="inputTelFixe" placeholder="Numéro de Téléphone fixe" name="fixe_number" value="{{Auth::guard('client')->user()->fixe_number}}">
							</div>
						  </div>

		                <div class="form-group is-empty">
		                  <label for="inputAddress" class="col-sm-4 control-label">Adresse de résidence</label>

		                  <div class="col-sm-8">
		                    <input class="form-control" id="inputAddress" placeholder="Adresse - Ville de résidence" name="address" value="{{Auth::guard('client')->user()->address}}" >
		                  </div>
		                </div>

						<div class="form-group is-empty">
							<label for="inputCity" class="col-sm-4 control-label">Quartier ou localité</label>

							<div class="col-sm-8">
							  <input class="form-control" id="inputCity" placeholder="Quartier..." name="address"value="{{Auth::guard('client')->user()->city}}">
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
