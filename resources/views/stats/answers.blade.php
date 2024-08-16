@extends('layouts.app')

@section('title', '| Retraits du jour')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-suitcase"></i> Retraits du jour
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-suitcase"></i> Retraits du jour </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @include('inc.messages')
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Résultats des retraits du jour</h3>
                        <a href="{{ route('checkcustomer') }}" class="btn bg-olive pull-right no-print">Faire dépôt</a>
                        <a href="#" class="btn btn-default pull-right no-print">Liste des retraits</a>

                    </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Code dépôt</th>
                                        <th>Date du dépôt</th>
                                        <th>Date effective retrait</th>
                                        <th>Total net</th>

                                        <th>Montant payé</th>
                                        <th>Nom du client</th>
                                        
                                        <th>Téléphone</th>
                                        <th>Nom du receptionniste</th>
                                        <th class="no-print">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(count($deposits) > 0)
                                        @foreach ($deposits as $deposit)
                                        <tr>
                                            <td>PE / {{ $deposit->id }}</td>
                                            <td>{{ $deposit->deposit_date->format('d/m/Y h:m:s')}}</td>
                                            <td>{{ $deposit->instant_retrieve }}</td>
                                            <td>{{ $deposit->total }}</td>
                                            @php
                                                $reste = $deposit->total - $deposit->advanced - $deposit->discount;
                                            @endphp

                                            <td>{{ $deposit->transaction($date_totake) }}</td>
                                            <td>{{ $deposit->client()->fullname }}</td>
                                            <td>{{ $deposit->client()->phone_number }}</td>
                                            <td>{{ $deposit->casheer() }}</td>
                                        <!--<td>{{ $deposit->retrieve_date }}</td>-->
                                            <td class="no-print">
                                                <a href="{{ route('deposits.show', $deposit->id) }}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Voir</a> <br/>
                                                <a href="{{ route('show_deposit', $deposit->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Voir details</a>
                                                {{-- <a href="{{ route('delivery.create', $deposit->id) }}" class="btn btn-info pull-left">Faire un Retrait</a>
                                                <a href="{{ route('deposits.edit', $deposit->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                                                {!! Form::open(['method' => 'DELETE', 'route' => ['deposits.destroy', $deposit->id] ]) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!} --}}
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                            <div class="col-lg-12">
                                                <div class="alert alert-danger">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span>x</span>
                                                    </button>
                                                    <span>
                                                        <strong><center>Aucun retrait trouvé!</center>  </strong> </span>
                                                </div>
                                            </div>
                                        @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" style="text-align: right;"><h4><b>TOTAL ENCAISSEMENT DU JOUR:</b></h4></td>
                                        <td><h4 style="color: green;"><b>{{$total}} F.CFA</b></h4></td>
                                    </tr>
                                    {{-- <tr>
                                        <td colspan="4" style="text-align: right;"><h4><b>TOTAUX RESTE A PAYER :</b></h4></td>
                                        <td><h4 style="color: darkred;"><b>{{$totalRest}} F.CFA</b></h4></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" style="text-align: right;"><h4><b>TOTAUX REMISES :</b></h4></td>
                                        <td><h4 style="color: green;"><b>{{$totalDiscount}} F.CFA</b></h4></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" style="text-align: right;"><h4><b>TOTAUX AVANCES PAYEES :</b></h4></td>
                                        <td><h4 style="color: green;"><b>{{$totalAdvanced}} F.CFA</b></h4></td>
                                    </tr> --}}

                                    <tr>
                                        <td colspan="7" style="text-align: right;"><h4><b>NOMBRE D'ARTICLES :</b></h4></td>
                                        <td><h4 style="color: darkred;"><b>{{$nbr_articles}} </b></h4></td>
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
