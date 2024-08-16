@extends('layouts.app')

@section('title', '| Résultats des dépôts')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-cart-arrow-down"></i> Classement client
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-cart-arrow-down"></i> Classement client </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @include('inc.messages')
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Classement client</h3>
                        <a href="{{ route('checkcustomer') }}" class="btn bg-olive pull-right no-print">Faire dépôt</a>
                        <a href="#" class="btn btn-default pull-right no-print">Classement client</a>

                    </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Client</th>
                                        <th>Numero de téléphone</th>
                                        <th>Total</th>
                                        <th>Nb de dépôt</th>
                                        <th class="no-print">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    {{-- {{$result}} --}}
                                        @foreach ($result as $deposit)

                                        <tr>
                                            <td>{{ $deposit['client'] }}</td>
                                            <td>{{ $deposit['client_tel'] }}</td>
                                            <td>{{ $deposit['total_amount'] }}</td>
                                            <td>{{ $deposit['nb_depot'] }}</td>
                                            <td class="no-print">
                                                <a href="{{ route('show_deposits', ['client_id' => $deposit['client_id'], 'date_debut' => $date_debut, 'date_fin' => $date_fin]) }}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Voir les dépots</a>
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
                                        {{-- <td colspan="6" style="text-align: right;"><h4><b>TOTAL</b></h4></td>
                                        <td><h4><b>{{$total}} F.CFA</b></h4></td> --}}
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
    <script>
        $("button").click(function(){
            $.post("demo_test_post.asp",
            {
                name: "Donald Duck",
                city: "Duckburg"
            },
            function(data, status){
                alert("Data: " + data + "\nStatus: " + status);
            });
        });
    </script>

@endsection
