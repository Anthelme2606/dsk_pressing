@extends('layouts.app')

@section('title', '| Permissions')

@section('content')

<section class="content-header">
      <h1>
        <i class="fa fa-key"></i>Permissions
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active"><i class="fa fa-key"></i>Permissions</li>
      </ol>
</section>

<!-- Main content -->
    <section class="content">
        @include('inc.messages')
      <div class="row">
            <div class="col-md-12">
                <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Permissions Disponibles</h3>
                    <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Utilisateurs</a>
                    <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th>Permissions</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td>
                                <td>
                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-info btn-xs pull-left" style="margin-right: 3px;">Editer</a>
                                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-xs">Supprimer</button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="box-footer">
                  <a href="{{ URL::to('permissions/create') }}" class="btn bg-olive">Ajouter Permission</a>
                </div>

            </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

@endsection
