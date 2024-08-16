@extends('layouts.app')

@section('title', '| Ajouter Role')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-key'></i> Ajouter Role
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-key'></i> Ajouter Role</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">
      <div class='col-lg-4 col-lg-offset-4'>
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class='fa fa-key'></i> Ajouter Role</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf
                  <div class="box-body">
                    <div class="form-group">
                        <label>Nom <span style="color: red;">*</span></label>
                        <input type="text" name="name" class="form-control" required/>
                    </div>

                    <h5><b>Assigner Permissions</b></h5>

                    <div class='form-group'>
                        @foreach ($permissions as $permission)
                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" required>
                            <label>{{ $permission->name }}</label>
                            {{-- {{ Form::checkbox('permissions[]',  $permission->id ) }}
                            {{ Form::label($permission->name, ucfirst($permission->name)) }}<br> --}}

                        @endforeach
                    </div>
                  </div>
                  <!-- /.box-body -->

              <div class="box-footer">
                <button class="btn bg-olive">Ajouter</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
      </div>
    </section>
    <!-- /.content -->

@endsection
