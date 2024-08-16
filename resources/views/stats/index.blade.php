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
                        <a href="{{ route('getCasheer', ['beginDate' => $beginDate, 'endDate'=>$endDate]) }}" class="btn bg-olive pull-right no-print">Stats caissiers</a>
                        <a href="#" class="btn btn-default pull-right no-print">Liste des retraits</a>

                    </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Code Dépôt</th>
                                        <th>Date de Dépôt</th>
                                        <th>Date de Retrait</th>
                                        <th>Total net</th>
                                        <th>Remise</th>
                                        <th>Total à payer</th>
                                        <th>Avance</th>
                                        <th>Remise</th>
                                        <th>Reste</th>
                                        <th>Client</th>
                                        <th>Caissier</th>
                                        <!--<th>Operations</th>-->
                                    </tr>
                                </thead>

                                <tbody>
                                        @foreach ($deposits as $deposit)
                                        <tr>
                                            <td>PE / {{ $deposit->id }}</td>
                                            <td>{{ $deposit->deposit_date->format('d/m/Y ')}}</td>
                                            <td>{{ $deposit->retrieve_date->format('d/m/Y ') }}</td>
                                            <td>{{ $deposit->total }}</td>
                                            <td>{{ $deposit->discount }}</td>
                                            <td>{{ $deposit->total - $deposit->discount }}</td>
                                            <td>{{ $deposit->advanced }}</td>
                                            <td>{{ $deposit->discount }}</td>
                                            <td>{{ $deposit->total - $deposit->advanced - $deposit->discount }}</td>
                                            <td>{{ $deposit->client()->fullname }}</td>
                                            <td>{{ $deposit->user()->fullname }}</td>

                                        </tr>
                                        @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" style="text-align: right;"><h4><b>Montant total (Dépots) :</b></h4></td>
                                        <td><h4 style="color: green;"><b>{{$total}} F.CFA</b></h4></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="text-align: right;"><h4><b> Total des retraits :</b></h4></td>
                                        <td><h4 style="color: green;"><b>{{$totalTransaction - $totalAdvanced}} F.CFA</b></h4></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" style="text-align: right;"><h4><b>Nombre d'articles (Dépôts):</b></h4></td>
                                        <td><h4 style="color: green;"><b>{{$nbr_articles}}</b></h4></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" style="text-align: right;"><h4><b>TOTAUX AVANCES PAYEES :</b></h4></td>
                                        <td><h4 style="color: green;"><b>{{$totalAdvanced}} F.CFA</b></h4></td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" style="text-align: right;"><h4><b>Recette globale espèces :</b></h4></td>
                                        <td><h4 style="color: darkred;"><b>{{$totalTransaction}} F.CFA</b></h4></td>
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
