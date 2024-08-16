@extends('layouts.app')

@section('title', '| Editer utilisateur')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h4>
    <i class='fa fa-user-plus'></i> Editer un utilisateur
  </h4>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class='fa fa-user-plus'></i> Editer utilisateur</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    @include('inc.messages')
<div class="row">

    <div class='col-md-8 col-md-offset-2'>
        <div class="box box-primary">
            <div class="box-header with-border">
              <h4 class="box-tite"><b> Edition de l'utilisateur :</b> <em style="color:rgb(5, 146, 104)">{{$user->fullname}}</em></h4>
            </div>


        <form action="{{ route('users.update', $user->id) }}" class="form-horizontal form-box remove-margin" method="POST" enctype="multipart/form-data">
            @method("PATCH")
            @csrf
        {{-- {{ Form::model($user, array('route' => array('users.update', $user->id) , 'method' => 'PUT', 'enctype' => 'multipart/form-data')) }}Form model binding to automatically populate our fields with user data --}}

        <div class="box-body">

            <div class="row">
              <div class="col-md-10 col-md-offset-1 ">

                <div class="form-group">
                  <label for="fullname">Nom et prénoms</label>
                  <input type="text" id="fullname" name="fullname" class="form-control" value="{{ $user->fullname }}" required>
                  {{-- {{ Form::label('name', 'Nom') }} --}}
                  {{-- {{ Form::text('name', '', array('class' => 'form-control', 'id' => 'name', 'onkeyup' => 'changeToUpperCase(this)')) }} --}}
                </div>
              </div>
              <div class="col-md-5 col-md-offset-1">

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control" >
                      {{-- {{ Form::label('email', 'Email') }}
                      {{ Form::email('email', '', array('class' => 'form-control')) }} --}}
                </div>

                <div class="form-group">
                  <label for="password">Mot de passe</label>
                  <input type="password" id="password" name="password" class="form-control" required>
                      {{-- {{ Form::label('password', 'Mot de passe') }}<br>
                      {{ Form::password('password', array('class' => 'form-control')) }} --}}
                </div>

                <div class="form-group">
                  <label for="address">Ville de résidence</label>
                  <input type="text" id="address" name="address" class="form-control" value="{{ $user->address }}" required>
                  {{-- {{ Form::label('address', 'Ville de résidence') }}
                  {{ Form::text('address', '' , array('class' => 'form-control', 'id' => 'address')) }} --}}
                </div>


                <h5><b>Assigner Rôle</b></h5><br>
              <div>
                {{-- @foreach ($roles as $role)
                      <div class="form-group form-check">
                          <input type="checkbox" class="form-check-input" name="roles[]" value="{{ $role->id }}" id="{{ $role->id }}"
                          @foreach ($user->roles as $userRole) @if ($userRole->id === $role->id) checked @endif @endforeach>
                          <label for="{{ $role->id }}" class="form-check-label">{{ $role->name }}</label>
                      </div>
                  @endforeach --}}
                  @foreach ($roles as $role)
                      <input type="checkbox" class="form-check-input" name="roles[]" value="{{ $role->id }}" id="{{ $role->id }}" 
                      @foreach ($user->roles as $userRole) @if ($userRole->id === $role->id) checked @endif @endforeach>
                      <label for="{{ $role->id }}" class="form-check-label"> {{ $role->name }}</label><br><br>
                      {{-- {{ Form::checkbox('roles[]',  $role->id ) }}
                      {{ Form::label($role->name, ucfirst($role->name)) }}<br> --}}
                  @endforeach
              </div>

              </div>

              <div class="col-md-4 col-md-offset-1">

                <div class="form-group">
                  <label for="phone_number">Numero de téléphone</label>
                  <input type="number" id="phone_number" name="phone_number" min="0" class="form-control" value="{{ $user->phone_number }}" required>
                  {{-- {{ Form::label('phone_number', 'Numero de téléphone') }}
                  {{ Form::text('phone_number', '', array('class' => 'form-control')) }} --}}
                </div>


                  <div class="form-group">
                    <label for="password">Confirmation du mot de passe</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                        {{-- {{ Form::label('password', 'Confirmation du mot de passe') }}<br>
                        {{ Form::password('password_confirmation', array('class' => 'form-control')) }} --}}

                  </div>

                  <div class="form-group">
                    <label for="picture">Image de profil</label>
                    <input type="file" id="picture" name="picture" class="form-control" >
                      {{-- {{ Form::label('profile_picture', 'Image de profil') }}
                      {{ Form::file('profile_picture') }} --}}
                  </div><br>

                  <div class="form-group">
                    <label for="agency">Agence de l'utilisateur</label>
                    <select id="agency_id" name="agency_id" class="form-control" required>
                      <option value="">Choisir une agence</option>
                      @foreach ($agencies as $agency)
                        <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                      @endforeach
                    </select>
                  </div>
              </div>
            </div>
           
            

        </div>
          <!-- /.box-body -->

        <div class="box-footer">
          <input type="submit" class="btn bg-olive" value="Editer" style="border-radius: 5px;">
          {{-- {{ Form::submit('Ajouter', array('class' => 'btn bg-olive')) }} --}}
        </div>
      {{-- {{ Form::close() }} --}}

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
    $('#fullname').on('keypress', function() { 
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
@endsection
