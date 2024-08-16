@extends('layouts.app')

@section('title', '| Create Permission')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-key'></i> Ajouter Permission
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-key'></i> Ajouter Permission</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">
      <div class='col-lg-4 col-lg-offset-4'>
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class='fa fa-key'></i> Ajouter Permission</h3>
                </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('permissions.store') }}" method="post">
                @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="name" class="form-control">
                        </div><br>
                            @if(!$roles->isEmpty()) //If no roles exist yet
                                <h4>Assigner Permission aux Roles</h4>

                                @foreach ($roles as $role)
                                <input type="checkbox" name="roles[]" value="{{ $role->id }}">
                                <label>{{ $role->name }}</label>

                                @endforeach
                            @endif
                    </div>
                <!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn bg-olive">Ajouter</button>
                </div>
                </form>
            </div>
          <!-- /.box -->
      </div>
    </section>
    <!-- /.content -->
@endsection
