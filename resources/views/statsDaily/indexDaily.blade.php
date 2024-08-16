@extends('layouts.app')

@section('title', '| Etats opérations journalières')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-cart-arrow-down"></i> Etats opérations journalières
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-cart-arrow-down"></i> Etats des dépôts de la journée </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @include('inc.messages')
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h5 class="box-title">Ventes de la journée</h5>
                        <a href="{{ route('checkcustomer') }}" class="btn bg-olive pull-right no-print">Faire dépôt</a>
                    </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <h5 align="center" class="box-title"><b>Bilan du</b> : {{$print_date->format('d-m-Y')}}</h5><br>
                            {{-- au {{$date_fin}} --}}
                            <h5 align="center"><b>Nombre de ligne(s) :</b> <span>{{ $nbre }}</span></h5><br>
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
                                        <th>Reste</th>
                                        <th>Client</th>
                                        <th>Action</th>
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
                                            <td>{{ $deposit->total - $deposit->discount }}</td>
                                            <td>{{ $deposit->advanced }}</td>
                                            <td>{{ $deposit->total - $deposit->advanced - $deposit->discount }}</td>
                                            <td>{{ $deposit->client()->fullname }}</td>
                                            <td>
                                                <a href="{{ route('deposits.show', $deposit->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Voir</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" style="text-align: right;"><h4><b>TOTAUX REMISES :</b></h4></td>
                                        <td><h4 style="color: green;"><b>{{$totalDiscount}} F.CFA</b></h4></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" style="text-align: right;"><h4><b>TOTAUX VENTES JOURNALIER:</b></h4></td>
                                        <td><h4 style="color: green;"><b>{{$total}} F.CFA</b></h4></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" style="text-align: right;"><h4><b>TOTAUX AVANCES PAYEES :</b></h4></td>
                                        <td><h4 style="color: green;"><b>{{$totalAdvanced}} F.CFA</b></h4></td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" style="text-align: right;"><h4><b>TOTAUX RESTE A PAYER :</b></h4></td>
                                        <td><h4 style="color: darkred;"><b>{{$totalRest}} F.CFA</b></h4></td>
                                    </tr>
                                    <tr>
                                        <td colspan="8" style="text-align: right;"><h4><b>NOMBRE D'ARTICLES :</b></h4></td>
                                        <td><h4 style="color: darkred;"><b>{{$nbr_articles}} </b></h4></td>
                                    </tr>
                                  </tfoot>

                            </table>
                        </div>

                        <div class="box-footer no-print">
                            <a class="btn btn-default" type = "button" onclick = "window.print()"><i class="fa fa-print" ></i> Imprimer</a>
                          <a href="{{ route('checkcustomer') }}" class="btn bg-olive pull-right">Faire un dépôt</a>
                        </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->

@endsection
