@extends('layouts.app')

@section('title', '| Dépôts')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-cart-arrow-down"></i> Dépôts
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-cart-arrow-down"></i> Dépôts classés</li>
  </ol>
</section>


    <!-- Main content -->
    <section class="content">
        @include('inc.messages')
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h5 class="box-title">Liste des dépôts classés</h5>
                        {{-- <a href="{{ route('checkcustomer') }}" class="btn bg-olive pull-right"><i class="fa fa-cart-arrow-down"></i> Nouveau dépôt</a> --}}
                        {{-- <a href="{{ route('deliveries.index') }}" class="btn btn-default pull-right"><i class="fa fa-suitcase"></i> Retraits</a> --}}

                    </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="display: none;">ID</th>
                                        <th style="width: 10%">Code</th>
                                        <th style="width: 15%">Client</th>
                                        <th>Date dépôt</th>
                                        <th style="width: 15%">Date de retrait prévu</th>
                                        <th>Nombre d'articles</th>
                                        <th>Opérations</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        @foreach ($deposits as $deposit)
                                        <tr>
                                            <td style="display: none;">{{ $deposit->id }}</td>
                                            <td style="width: 10%">{{ $deposit->code }}</td>
                                            <td style="width: 15%">{{ $deposit->client()->fullname }}</td>
                                            <td>{{ $deposit->created_at}}</td>
                                            <td style="width: 15%">{{ $deposit->retrieve_date }}</td>
                                            <td>{{ $deposit->article_qte() }}</td>
                                            <td>

                                                <a href="{{ route('deposits.show', $deposit->id) }}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Voir</a>
                                                <a href="{{ route('deposits.bon', $deposit->id) }}" class="btn btn-info btn-xs"><i class="fa fa-file"></i> Bon</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                </tbody>

                            </table>
                        </div>

                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->

@endsection

