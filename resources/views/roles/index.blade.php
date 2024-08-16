@extends('layouts.app')

@section('title', '| Rôles')

@section('content')

<section class="content-header">
      <h1>
        <i class="fa fa-key"></i>Roles
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
         <li class="active"><i class="fa fa-key"></i> Rôles</li>
      </ol>
</section>

    <!-- Main content -->
<section class="content">
      @include('inc.messages')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Table des Rôles</h3>
          <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Utilisateurs</a>
            <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a>
        </div>
            <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Role</th>
                                <th>Permissions</th>
                                <th>Operation</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                                <td>
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info  btn-xs pull-left" style="margin-right: 3px;">Editer</a>
                                <form action="{{ route('roles.destroy', $role->id) }}">
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-xs" type="submit">Supprimer</button>
                                </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

                <div class="box-footer clearfix">
                  <a href="{{ URL::to('roles/create') }}" class="btn bg-olive">Ajouter Role</a>
                </div>

    </div>
        </div>

    </div>
</section>
    <!-- /.content -->



@endsection
