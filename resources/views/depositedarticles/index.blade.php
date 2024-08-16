@extends('layouts.app')

@section('title', '| Articles')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Panier Des Articles
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><i class="fa fa-users"></i> Panier Des Articles </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @include('inc.messages')
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Panier Des Articles</h3>
                        <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a>
                        <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a>
                    </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Articles</th>
                                        <th>Désignations</th>
                                        <th>Prix unitaire</th>
                                        <th>Montant</th>
                                        <th>Client</th>
                                        <th>Date/Heure d'Ajout</th>
                                        <th>Operations</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        @foreach ($depositedarticles as $depositedarticle)
                                        <tr>
                                            <td>{{ $depositedarticle->article_title }}</td>
                                            <td>{{ $depositedarticle->designation }}</td>
                                            <td>{{ $depositedarticle->unit_price }}</td>
                                            <td>{{ $depositedarticle->amount }}</td>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $depositedarticle->created_at }}</td>
                                            <td>
                                            <a href="{{ route('depositedarticles.edit', $depositedarticle->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                                            {!! Form::open(['method' => 'DELETE', 'route' => ['depositedarticles.destroy', $depositedarticle->id] ]) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}

                                            </td>
                                        </tr>
                                        @endforeach
                                </tbody>

                            </table>
                        </div>

                        <div class="box-footer clearfix">
                          <a href="{{ route('depositedarticle.create',$customer->id) }}" class="btn bg-olive pull-right">Ajouter Article</a>
                          <a href="{{ route('deposit.create', $customer->id) }}" class="btn bg-olive pull-right">Valider le Dépôt</a>
                        </div>
                </div>
            </div>
        </div>
        
    </section>
    <!-- /.content -->

@endsection
