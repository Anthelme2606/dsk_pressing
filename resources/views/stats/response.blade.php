@extends('layouts.app')

@section('title', '| Résultats des dépôts')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-cart-arrow-down"></i> Résultats des dépôts
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-cart-arrow-down"></i> Résultats des dépôts </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @include('inc.messages')
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Résultats des dépôts</h3>
                        <a href="{{ route('checkcustomer') }}" class="btn bg-olive pull-right no-print">Faire dépôt</a>
                        <a href="#" class="btn btn-default pull-right no-print">Liste des retraits</a>

                    </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Total</th>
                                        <th>Code Dépôt</th>
                                        <th>Date de Dépôt</th>
                                        <th>Date de Retrait</th>
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
                                            <td>{{ $deposit->total }}</td>
                                            <td>PE / {{ $deposit->id }}</td>
                                            <td>{{ $deposit->deposit_date->format('d/m/Y ')}}</td>
                                            <td>{{ $deposit->retrieve_date->format('d/m/Y ') }}</td>
                                            <td>{{ $deposit->advanced }}</td>
                                            <td>{{ $deposit->discount }}</td>
                                            <td>{{ $deposit->total - $deposit->advanced - $deposit->discount }}</td>
                                            <td>{{ $deposit->client()->fullname }}</td>
                                            <td class="no-print">
                                                <a href="{{ route('deposits.show', $deposit->id) }}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Voir</a>


                                            </td>
                                        </tr>
                                        @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <!--<td style="border: none;"></td>
                                        <td style="border: none;"></td>
                                        <td style="border: none;"></td>
                                        <td style="border: none;"></td>
                                        <td style="border: none;"></td>
                                        <td style="border: none;"></td>-->
                                        <td colspan="6" style="text-align: right;"><h4><b>TOTAL</b></h4></td>
                                        <td><h4><b>{{$total}} F.CFA</b></h4></td>
                                    </tr>
                                </tfoot>

                            </table>
                        </div>

                        <div class="box-footer no-print">
                          <a class="btn btn-default" type = "button" onclick = "window.print()"><i class="fa fa-print" ></i> Imprimer</a>
                          <a href="{{ route('checkcustomer') }}" class="btn bg-olive pull-right">Retour</a>
                        </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->

@endsection
