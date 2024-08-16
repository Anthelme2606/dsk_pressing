@extends('layouts.app')

@section('title', '| Résultats des remises sur dépôts')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-cart-arrow-down"></i> Résultats des remises sur dépôts
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-cart-arrow-down"></i> Résultats des remises sur dépôts </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @include('inc.messages')
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Résultats des remises sur dépôts</h3>
                        <a href="{{ route('checkcustomer') }}" class="btn bg-olive pull-right no-print">Faire dépôt</a>
                        <a href="#" class="btn btn-default pull-right no-print">Liste des remises sur dépôts</a>

                    </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Code Dépôt</th>
                                        <th>Date de Dépôt</th>
                                        <th>Date de Retrait</th>
                                        <th>Total</th>
                                        <th>Réduction</th>
                                        <th>Taux</th>
                                        <th>Avance</th>
                                        <th>Reste</th>
                                        <th>Client</th>
                                        <!--<th>Operations</th>-->
                                    </tr>
                                </thead>

                                <tbody>
                                        @foreach ($deposits as $deposit)
                                        <tr>
                                            <td>PE/{{ $deposit->id }}</td>
                                            <td>{{ $deposit->deposit_date->format('d/m/Y ')}}</td>
                                            <td>{{ $deposit->retrieve_date->format('d/m/Y ') }}</td>
                                            <td>{{ $deposit->total }}</td>
                                            <td>{{ $deposit->discount }}</td>
                                            <td>{{ number_format(($deposit->discount * 100) / ($deposit->total + $deposit->discount), 2, '.', '')}} %</td>
                                            <td>{{ $deposit->advanced }}</td>
                                            <td>{{ $deposit->total - $deposit->advanced }}</td>
                                            <td>{{ $deposit->client()->fullname }}</td>

                                        </tr>
                                        @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <!--<td style="border: none;"></td>
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
                          <a href="{{ route('checkcustomer') }}" class="btn bg-olive pull-right">Faire un Dépôt</a>
                        </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->

@endsection
