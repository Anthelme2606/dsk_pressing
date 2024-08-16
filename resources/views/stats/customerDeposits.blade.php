@extends('layouts.app')

@section('title', '| Résultats des dépôts')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Dépôts par Client
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-users"></i> Dépôts par Client <p /li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @include('inc.messages')
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Dépôts du Client</h3>
                        <a href="{{ route('checkcustomer') }}" class="btn bg-olive pull-right no-print">Faire dépôt</a>
                    </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Code dépôt</th>
                                        <th>Date de dépôt</th>
                                        <th>Date de retrait</th>
                                        <th>Total</th>
                                        <th>Avance</th>
                                        <th>Remise</th>
                                        <th>Reste</th>
                                        <th>Client</th>
                                        <th class="no-print">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        @foreach ($deposits as $deposit)
                                        <tr>
                                            <td>PE / {{ $deposit->id }}</td>
                                            <td>{{ $deposit->deposit_date->format('d/m/Y ')}}</td>
                                            <td>{{ $deposit->retrieve_date->format('d/m/Y ') }}</td>
                                            <td>{{ $deposit->total }}</td>
                                            <td>{{ $deposit->advanced }}</td>
                                            <td>{{ $deposit->discount }}</td>
                                            <td>{{ $deposit->total - $deposit->advanced - $deposit->discount }}</td>
                                            <td>{{ $deposit->client()->fullname }}</td>
                                            <td class="no-print">
                                                <a href="{{ route('deposits.show', $deposit->id) }}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Voir</a>
                                                {{--<a href="{{ route('delivery.create', $deposit->id) }}" class="btn btn-info pull-left">Faire un Retrait</a>
                                                 <a href="{{ route('deposits.edit', $deposit->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['deposits.destroy', $deposit->id] ]) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!} --}}
                                            </td>
                                        </tr>
                                        @endforeach
                                </tbody>

                            </table>
                        </div>

                        <div class="box-footer no-print">
                            <a class="btn btn-default" type = "button" onclick = "window.print()"><i class="fa fa-print" ></i> Imprimer</a>
                          <a href="{{ route('checkcustomer') }}" class="btn bg-olive pull-right">Faire un Dépôt</a>
                        </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->

@endsection
