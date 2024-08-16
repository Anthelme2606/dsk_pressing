{{-- \resources\views\users\create.blade.php --}}
@extends('layouts.app3')

@section('title', '| Ajouter utilisateur')

@section('content')

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
      @include('inc.messages')
      <div class='col-md-10 col-md-offset-1'>
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h4 class="box-tite"><b> Ajout d'un nouvel utilisateur</b></h4>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('superadmin.users.store') }}" class="box-body" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nom complet</label>
                                    <input type="text" class="form-control" name="fullname" id="fullname" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Adresse email</label>
                                    <input type="email" class="form-control" name="email" id="email" required/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mot de passe</label>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Confirmation du mot de passe</label>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Numero de téléphone</label>
                                    <input type="tel" class="form-control" name="phone_number" id="phone_number" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Adresse</label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Togo, Lomé, Totsi-Gblinkomé, 10, 22" required/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Agence d'affiliation</label>
                                    <select name="agency" id="agency" class="form-control">
                                        @foreach ($agencies as $agency)
                                            <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Assigner Role</label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="Manager">Manager</option>
                                        <option value="Admin">Admin</option>
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
@endsection
