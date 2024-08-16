{{-- \resources\views\users\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Ajouter classeur')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>
        <i class='fa fa-user-plus'></i> Classeurs
      </h4>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-user-plus'></i> Ajouter classeur</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">
      @include('inc.messages')
      <div class='col-md-8 col-md-offset-2'>
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h4 class="box-tite" style="text-align: center;"><b> Ajouter un(e) classeur(se)</b></h4>
                </div>

                <form action="{{ route('classeurs.store') }}" class="form-horizontal form-box remove-margin" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="box-body">

                        <div class="row">
                            <div class="col-md-4 col-md-offset-1">
                                <div class="form-group">
                                    <label for="fullname">Nom et prénoms <span style="color: red;">*</span></label>
                                    <input type="text" id="fullname" name="fullname" class="form-control" required value="{{ old("fullname") }} ">
                                </div>
                            </div>

                            <div class="col-md-4 col-md-offset-1">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-md-offset-1">
                                <div class="form-group">
                                    <label>Mot de passe <span style="color: red;">*</span></label>
                                    <div class="row">
                                        <div class="col-md-11">
                                            <input type="password" name="password" class="form-control" placeholder="Veuillez définir un mot de passe" id="pwd" value="{{ old('password') }}" required/>
                                        </div>
                                        <div class="col-md-1">
                                            <span class="form-feedback pull-right">
                                              <i type="button" class="fa fa-eye-slash" id="icon_pwd"  onclick="show_password()"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-md-offset-1">
                                <div class="form-group">
                                    <label>Confirmation du mot de passe <span style="color: red;">*</span></label>
                                    <div class="row">
                                        <div class="col-md-11">
                                            <input type="password" class="form-control" name="password_confirmation" placeholder="Veuillez resaisir votre mot de passe " id="pwd_confirm" onchange="confirm()" value="{{ old('password_confirmation') }}" required/>
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
                            <div class="col-md-4 col-md-offset-1">
                                <div class="form-group">
                                    <label for="address">Ville de résidence <span style="color: red;">*</span></label>
                                    <input type="text" id="address" name="address" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-4 col-md-offset-1">
                                <div class="form-group">
                                    <label for="phone_number">Numero de téléphone <span style="color: red;">*</span></label>
                                    <input type="number" id="phone_number" name="phone_number" min="0" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-md-offset-1">
                                <div class="">
                                    <label for="picture">Image de profil</label>
                                    <input type="file" id="picture" name="picture" class=""/>
                                </div>
                            </div>
                            @if(auth()->user()->getRoleNames()->contains("admin"))
                            <div class="col-md-4 col-md-offset-1">
                                <div class="form-group">
                                    <label for="agency">Agence de travail du classeur <span style="color: red;">*</span></label>
                                    <select id="agency_id" name="agency_id" class="form-control" required>
                                    <option value="">Choisir une agence</option>
                                    @foreach ($agencies as $agency)
                                        <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            @else
                            <input type="hidden" value="{{ auth()->user()->agency_id }}" name="agency_id" />
                            @endif
                        </div>

                        <div class="box-footer" style="text-align: center;">
                            <input style="text-align: center;" type="submit" class="btn bg-olive" value="Ajouter" style="border-radius: 5px;"/>
                        </div>
                    </div>
                </form>


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
    $('#Fullname').on('keypress', function() {
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
@endsection
